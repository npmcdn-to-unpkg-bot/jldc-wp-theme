<?php
/**
 * This is a set of functions that set up a custom post type for portfolio pieces
 * as individual posts and a gallery to display them all.
 */

function jldc_portfolio_register() {
	$args = array(
		'label' => __('Portfolio'),
	)
}