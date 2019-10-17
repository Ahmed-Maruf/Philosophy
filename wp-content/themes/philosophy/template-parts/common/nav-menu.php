<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

<nav class="header__nav-wrap">

	<h2 class="header__nav-heading h6">Site Navigation</h2>

	<?php
	wp_nav_menu(array(
		'menu'              => "Top Philosophy menu", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
		'menu_class'        => "header__nav", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
		'menu_id'           => "topmenu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
		'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
		'container_class'   => "header__nav-wrap", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
		'theme_location'    => "topmenu", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
	));
	?>

	<a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

</nav> <!-- end header__nav-wrap -->