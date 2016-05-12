<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Document</title>
	<?php wp_head(); ?>
</head>
<body>

<header id="pageHeader" role="banner">
	<h1 id="masthead">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/_img/logoMasthead.svg" alt="<?php echo bloginfo( 'name' ); ?>">
	</h1>
</header>

<main role="main">

</main>

<footer id="pageFooter" role="contentinfo">

</footer>

<?php wp_footer(); ?>
</body>
</html>
