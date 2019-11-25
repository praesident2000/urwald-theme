<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});

	add_filter('template_include', function( $template ) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_menus' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

		register_post_type( 'urwald_tour', [
            'labels' => [
                'name' => __( 'Touren' ),
                'singular_name' => __( 'Tour' ),
                'add_new_item' => __( 'Neue Tour hinzufügen' ),
                'edit_item' => __( 'Tour bearbeiten' ),
                'new_item' => __( 'Neue Tour' ),
                'view_item' => __( 'Tour ansehen' ),
                'all_items' => __( 'Alle Touren' ),
                'search_items' => __( 'Touren durchsuchen' ),
                'not_found' => __( 'Keine Touren gefunden.' ),
                'not_found_in_trash' => __( 'Keine Touren im Papierkorb gefunden.' ),
            ],
            'menu_icon' => 'dashicons-location-alt',
            'menu_position' => 21,
            'supports' => ['title', 'custom-fields', 'revisions'],
            'public' => true,
            'has_archive' => true,
            'show_in_nav_menus' => true,
            'rewrite' => ['slug' => 'tours', 'with_front' => false],
            'taxonomies' => ['category'],
		] );

		register_post_type( 'urwald_article', [
            'labels' => [
                'name' => __( 'Artikel' ),
                'singular_name' => __( 'Artikel' ),
                'add_new_item' => __( 'Neuen Artikel hinzufügen' ),
                'edit_item' => __( 'Artikel bearbeiten' ),
                'new_item' => __( 'Neue Artikel' ),
                'view_item' => __( 'Artikel ansehen' ),
                'all_items' => __( 'Alle Artikel' ),
                'search_items' => __( 'Artikel durchsuchen' ),
                'not_found' => __( 'Keine Artikel gefunden.' ),
                'not_found_in_trash' => __( 'Keine Artikel im Papierkorb gefunden.' ),
            ],
            'menu_icon' => 'dashicons-editor-table',
            'menu_position' => 20,
            'supports' => ['title', 'custom-fields', 'revisions'],
            'public' => true,
            'has_archive' => true,
            'show_in_nav_menus' => true,
            'rewrite' => ['slug' => 'articles', 'with_front' => false],
            'taxonomies' => ['category'],
		] );

		register_post_type( 'urwald_overlay', [
            'labels' => [
                'name' => __( 'Overlays' ),
                'singular_name' => __( 'Overlay' ),
                'add_new_item' => __( 'Neues Overlay hinzufügen' ),
                'edit_item' => __( 'Overlay bearbeiten' ),
                'new_item' => __( 'Neues Overlay' ),
                'view_item' => __( 'Overlay ansehen' ),
                'all_items' => __( 'Alle Overlays' ),
                'search_items' => __( 'Overlays durchsuchen' ),
                'not_found' => __( 'Keine Overlays gefunden.' ),
                'not_found_in_trash' => __( 'Keine Overlays im Papierkorb gefunden.' ),
            ],
            'menu_icon' => 'dashicons-format-status',
            'menu_position' => 22,
            'supports' => ['title', 'custom-fields', 'revisions'],
            'public' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'show_in_nav_menus' => false,
			'has_archive' => false,
			'rewrite' => false,
		] );

		register_post_type( 'urwald_slider', [
            'labels' => [
                'name' => __( 'Teaser Slider' ),
                'singular_name' => __( 'Slider' ),
                'add_new_item' => __( 'Neuen Slider hinzufügen' ),
                'edit_item' => __( 'Slider bearbeiten' ),
                'new_item' => __( 'Neuer Slider' ),
                'view_item' => __( 'Slider ansehen' ),
                'all_items' => __( 'Alle Slider' ),
                'search_items' => __( 'Slider durchsuchen' ),
                'not_found' => __( 'Keine Slider gefunden.' ),
                'not_found_in_trash' => __( 'Keine Slider im Papierkorb gefunden.' ),
            ],
            'menu_icon' => 'dashicons-format-gallery',
            'menu_position' => 23,
            'supports' => ['title', 'custom-fields', 'revisions'],
            'public' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'show_in_nav_menus' => false,
			'has_archive' => false,
			'rewrite' => false,
		] );

	}
	public function register_menus()
    {
		register_nav_menu( 'main-menu', __( 'Hauptnavigation', 'urwald-theme' ) );
		register_nav_menu( 'meta-menu', __( 'Metanavigation', 'urwald-theme' ) );
		register_nav_menu( 'legal-menu', __( 'Rechtliches', 'urwald-theme' ) );
    }

	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		// $context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['main_menu']  = new TimberMenu( 'main-menu' );
		$context['meta_menu']  = new TimberMenu( 'meta-menu' );
		$context['legal_menu'] = new TimberMenu( 'legal-menu' );
		$context['options'] = get_fields('options');
		$context['zoom'] = 11;
		$context['site'] = $this;
		return $context; 
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support( 'menus' );
	}

	public function deregister_scripts()
    {
        wp_deregister_script( 'jquery' );

        // We do not use widgets. Deregister react and react-dom from the real-media-library plugin.
        wp_deregister_script( 'react' );
        wp_deregister_script( 'react-dom' );

        // No Embeds by default
        wp_deregister_script( 'wp-embed' );
	}
	
	public function wps_deregister_styles() {

		// Remove the unused Gutenberg styles
	    wp_dequeue_style( 'wp-block-library' );
	    wp_deregister_style( 'wp-block-library' );
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();

if( function_exists('acf_add_options_page') ) {
 	
	// add parent
   $parent = acf_add_options_page(array(
	   'page_title' 	=> 'Theme Optionen',
	   'menu_title' 	=> 'Optionen',
	   'menu_slug' 	    => 'theme-settings',
	   'redirect' 		=> false
   ));

};

/**
 * Hide WordPress core features to replace them with ACF
 */
function remove_wordpress_features()
{
	remove_post_type_support( 'page', 'editor' );
	remove_post_type_support( 'page', 'thumbnail' );
	remove_post_type_support( 'post', 'editor' );
	remove_post_type_support( 'post', 'thumbnail' );
	remove_post_type_support( 'post', 'tags' );
}
add_action( 'admin_init', 'remove_wordpress_features' );

/**
 * Disable comment features and hide the comments backend
 */

function remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_admin_menus' );

function remove_comment_support() {
   remove_post_type_support( 'post', 'comments' );
   remove_post_type_support( 'page', 'comments' );
}
add_action('init', 'remove_comment_support', 100);

function remove_comments_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'remove_comments_admin_bar' );

function remove_dashboard_meta() {

	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );   // Incoming Links
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );          // Plugins
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );        // Quick Press
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );      // Recent Drafts
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );            // WordPress blog
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );          // Other WordPress News    
    remove_action( 'welcome_panel', 'wp_welcome_panel' );                   // Remove WordPress Welcome Panel

}
add_action( 'admin_init', 'remove_dashboard_meta' );

add_action('admin_enqueue_scripts', 'admin_style');
function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/dist/admin.css');
}