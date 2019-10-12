<?php

if (!function_exists('philosophy_setup')) {
	/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
	load_theme_textdomain('philosophy', get_template_directory() . '/languages');

	//Add post formats

	add_theme_support('post-formats', array('aside', 'gallery', 'aside', 'link', 'quote', 'status', 'video', 'audio'));
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 190,
			'width'       => 190,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Add support for Block Styles.
	add_theme_support('wp-block-styles');

	// Add support for full and wide align images.
	add_theme_support('align-wide');

	// Add support for editor styles.
	add_theme_support('editor-styles');

	// Enqueue editor styles.
	add_editor_style('assets/css/style-editor.css');

	// Add support for responsive embedded content.
	add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'philosophy_setup');
