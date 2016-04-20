// Read package.json file into variable
var project_pkg = require('./package.json');

// Gulp Task Variables
var
    gulp         = require('gulp'),
    gutil        = require('gulp-util'),
    concat       = require('gulp-concat'),
    gulpif       = require('gulp-if'),
    imagemin     = require('gulp-imagemin'),
    phpcs        = require('gulp-phpcs'),
    htmlhint     = require('gulp-htmlhint'),
    sass         = require('gulp-ruby-sass'),
    postcss      = require('gulp-postcss'),
    animation    = require('postcss-animation'),
    autoprefixer = require('autoprefixer'),
    cssnano      = require('cssnano'),
    uglify       = require('gulp-uglify'),
    watch        = require('gulp-watch');

// Set Environment: 'dev' or 'prod' only acceptable values
var envType = 'dev';

// Make sure environment is set to an acceptable value
if (envType !== 'dev' && envType !== 'prod') {
    throw new Error('EnvType has incorrect value: use "dev" or "prod"');
}

// Set base directory definition
var dirBase = './builds/' + envType;

// Set environment specific parameters
var imgOptLevel;

if (envType === 'dev') {
    imgOptLevel = 3;
} else {
    imgOptLevel = 7;
}

// Define Project Object
project = {
    base: dirBase,
    html: {
        dest: dirBase,
        htmlhint: {
            options: {
                "tag-pair": true,
                "tagname-lowercase": true,
                "attr-lowercase": true,
                "attr-double-quotes": true,
                "attr-value-not-empty": true,
                "attr-no-duplication": true,
                "doctype-first": true,
                "tag-self-close": true,
                "spec-char-escape": true,
                "id-unique": true,
                "inline-style-disabled": true,
                "inline-script-disabled": true,
                "src-not-empty": true,
                "alt-require": true,
                "title-require": true,
                "doctype-html5": true,
                "id-class-ad-disabled": true,
                "attr-unsafe-chars": true,
                "space-tab-mixed-disabled": "space"
            }
        },
        src: [dirBase + '/**/*.html']
    },
    css: {
        dest: dirBase,
        postcss: {
            autoprefix: 'last 4 versions'
        },
        src: ['./src/css/style.css']
    },
    img: {
        dest: dirBase + '/_img',
        settings: {
            optimizationLevel: imgOptLevel,
            progressive: true
        },
        src :'src/images/**/*.{png,gif,jpg,svg}'
    },
    javascript: {
        dest: dirBase + '/_js',
        header: {
          src: ['./src/javascript/header/*.js']
        },
        src: ['./src/javascript/plugins/*.js', './src/javascript/*.js']
    },
    php: {
       dest: dirBase,
       phpcs: {
            settings: {
                bin: 'phpcs.bat',
                standard: 'WordPress-VIP'
            }
       },
       src: [dirBase + '/**/*.php']
    },
    sass: {
        dest: './src/css/',
        settings: {
            compass: true,
            lineNumbers: true,
            precision: 8,
            style: 'expanded',
            sourcemap: true,
            require: ['breakpoint', 'susy']
        },
        src: ['./src/sass/**/*.scss'],
        styleSrc: ['./src/sass/style.scss']

    }
};

gulp.task('css', function() {
    gulp.src(project.css.src)
        .pipe(postcss([
            animation(),
            autoprefixer({browsers: [project.css.postcss.autoprefix]}),
            cssnano()
        ]))
        .on('error', gutil.log)
        .pipe(gulp.dest(project.css.dest))
});

gulp.task('images', function() {
    gulp.src(project.img.src)
        .pipe(imagemin(project.img.settings))
        .pipe(gulp.dest(project.img.dest))
});

gulp.task('js-header', function() {
    gulp.src(project.javascript.header.src)
        .pipe(concat('header.js'))
        .on('error', gutil.log)
        .pipe(gulpif(envType === 'prod', uglify()))
        .pipe(gulp.dest(project.javascript.dest))
});

gulp.task('js-footer', function() {
    gulp.src(project.javascript.src)
        .pipe(concat('script.js'))
        .on('error', gutil.log)
        .pipe(gulpif(envType === 'prod', uglify()))
        .pipe(gulp.dest(project.javascript.dest))
});

gulp.task('php-lint', function() {
    return gulp.src(project.php.src)
        .pipe(phpcs(project.php.phpcs.settings))
        .pipe(phpcs.reporter('log'))
});

gulp.task('html-lint', function() {
   return gulp.src(project.html.src)
       .pipe(htmlhint(project.html.htmlhint.options))
       .pipe(htmlhint.reporter())
});

gulp.task('sass', function() {
    return sass(project.sass.styleSrc, project.sass.settings)
        .on('error', gutil.log)
        .pipe(gulp.dest(project.sass.dest))
});

gulp.task('javascript', ['js-header', 'js-footer']);
gulp.task('default', ['php-lint', 'sass', 'javascript', 'images']);

gulp.task('watch', ['default'], function() {
    gulp.watch(project.php.src, ['php-lint']);
    gulp.watch(project.sass.src, ['sass']);
    gulp.watch(project.css.src, ['css']);
    gulp.watch(project.javascript.src, ['javascript']);
});