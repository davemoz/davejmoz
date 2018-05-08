<?php
/**
 * davejmoz functions and definitions
 *
 * @package davejmoz
 */

if ( ! function_exists( 'davejmoz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function davejmoz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on davejmoz, use a find and replace
	 * to change 'davejmoz' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'davejmoz', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'davejmoz' ),
		'social' => esc_html__( 'Social Menu', 'davejmoz' ),
	) );

	/**
	* Custom Social Media Nav Walker by Aurooba Ahmed
	* This uses Font Awesome and adds in the correct icon by detecting the URL of the menu item.
	* You can use this by doing a custom wp_nav_menu query:
	* wp_nav_menu(array('items_wrap'=> '%3$s', 'walker' => new WO_Nav_Social_Walker(), 'container'=>false, 'menu_class' => '', 'theme_location'=>'social', 'fallback_cb'=>false ));
	*
	*/
	class Walker_Social_Nav_Menu extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent\n";
		}
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$item_output = $args->before;
	        if (strpos($item->url, 'facebook') !== false) {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-facebook-f"></i>';
	            $item_output .= '</a>';
	            $item_output .= $args->after;
	        } elseif (strpos($item->url, 'twitter') !== false)  {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-twitter">';
	            $item_output .= '</i></a>';
	            $item_output .= $args->after;
	        } elseif (strpos($item->url, 'instagram') !== false)  {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-instagram">';
	            $item_output .= '</i></a>';
	            $item_output .= $args->after;
	        } elseif (strpos($item->url, 'dribbble') !== false)  {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-dribbble">';
	            $item_output .= '</i></a>';
	            $item_output .= $args->after;
			} elseif (strpos($item->url, 'linkedin') !== false)  {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-linkedin-in">';
	            $item_output .= '</i></a>';
	            $item_output .= $args->after;
	        }  elseif (strpos($item->url, 'snapchat') !== false)  {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-snapchat-ghost">';
	            $item_output .= '</i></a>';
	            $item_output .= $args->after;	            
	        } elseif (strpos($item->url, 'youtube') !== false)  {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-youtube">';
	            $item_output .= '</i></a>';
	            $item_output .= $args->after;	
	        }			
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "\n";
		}
	}

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
      * Add Editor Style for adequate styling in text editor.
      *
      * @link http://codex.wordpress.org/Function_Reference/add_editor_style
      */
	add_editor_style( 'editor-style.css' );

}
endif; // davejmoz_setup
add_action( 'after_setup_theme', 'davejmoz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function davejmoz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'davejmoz_content_width', 640 );
}
add_action( 'after_setup_theme', 'davejmoz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function davejmoz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'davejmoz' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'davejmoz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function davejmoz_scripts() {
	wp_enqueue_style( 'davejmoz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'font-awesome', '//use.fontawesome.com/releases/v5.0.12/js/all.js', array(), null );

	wp_enqueue_script( 'davejmoz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'davejmoz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'davejmoz_scripts' );

/**
 * Filter the HTML script tag of `font-awesome` script to add `defer` attribute.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @return   Filtered HTML script tag.
 */
add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );

function add_defer_attribute( $tag, $handle ) {

    if ( 'font-awesome' === $handle ) {
        $tag = str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
