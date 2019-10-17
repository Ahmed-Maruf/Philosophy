<?php

if (site_url() == 'http://localhost:8000') {
	define('VERSION', time());
} else {
	define('VERSION', wp_get_theme()->get('Version'));
}
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

	register_nav_menus(array(
		'topmenu' => __("Top Menu", "Philosophy top menu")
	));
}
add_action('after_setup_theme', 'philosophy_setup');

if (!function_exists('philosophy_front_assets')) {
	function philosophy_front_assets()
	{
		wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.css'), null, "1.0");
		wp_enqueue_style('fonts', get_theme_file_uri('/assets/css/fonts.css'), null, "1.0");
		wp_enqueue_style('base', get_theme_file_uri('/assets/css/base.css'), null, "1.0");
		wp_enqueue_style('vendor', get_theme_file_uri('/assets/css/vendor.css'), null, "1.0");
		wp_enqueue_style('main', get_theme_file_uri('/assets/css/main.css'), null, "1.0");
		wp_enqueue_style('philosophy', get_stylesheet_uri(), null, VERSION);

		wp_enqueue_script('modernizer', get_theme_file_uri("/assets/js/modernizr.js"), null, "1.0");
		wp_enqueue_script('pace', get_theme_file_uri("/assets/js/pace.min.js"), null, "1.0");
		wp_enqueue_script('modernize', get_theme_file_uri("/assets/js/plugins.js"), array('jquery'), "1.0", true);
		wp_enqueue_script('main', get_theme_file_uri("/assets/js/main.js"), array('jquery'), VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'philosophy_front_assets');

//This function is responsible for adding "my-parent-item" class to parent menu item's
function add_menu_parent_class($items)
{
	$parents = array();
	foreach ($items as $item) {
		//Check if the item is a parent item
		if ($item->menu_item_parent && $item->menu_item_parent > 0) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ($items as $item) {
		if (in_array($item->ID, $parents)) {
			//Add "menu-parent-item" class to parents
			$item->classes[] = 'has-children';
		}
	}

	return $items;
}

//add_menu_parent_class to menu
add_filter('wp_nav_menu_objects', 'add_menu_parent_class');
