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

	/*
	 * Add Markdown support for Projects
	 * 
	 */
	add_action('init', 'my_custom_init');
	function my_custom_init() {
		add_post_type_support( 'projects', 'wpcom-markdown' );
	}

	// Register Custom Post Type
	function projects_custom_post_type() {

		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'davejmoz' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'davejmoz' ),
			'menu_name'             => __( 'Projects', 'davejmoz' ),
			'name_admin_bar'        => __( 'Project', 'davejmoz' ),
			'archives'              => __( 'Project Archives', 'davejmoz' ),
			'attributes'            => __( 'Project Attributes', 'davejmoz' ),
			'parent_item_colon'     => __( 'Parent Project:', 'davejmoz' ),
			'all_items'             => __( 'All Projects', 'davejmoz' ),
			'add_new_item'          => __( 'Add New Project', 'davejmoz' ),
			'add_new'               => __( 'Add New', 'davejmoz' ),
			'new_item'              => __( 'New Project', 'davejmoz' ),
			'edit_item'             => __( 'Edit Project', 'davejmoz' ),
			'update_item'           => __( 'Update Project', 'davejmoz' ),
			'view_item'             => __( 'View Project', 'davejmoz' ),
			'view_items'            => __( 'View Projects', 'davejmoz' ),
			'search_items'          => __( 'Search Projects', 'davejmoz' ),
			'not_found'             => __( 'Not found', 'davejmoz' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'davejmoz' ),
			'featured_image'        => __( 'Featured Image', 'davejmoz' ),
			'set_featured_image'    => __( 'Set featured image', 'davejmoz' ),
			'remove_featured_image' => __( 'Remove featured image', 'davejmoz' ),
			'use_featured_image'    => __( 'Use as featured image', 'davejmoz' ),
			'insert_into_item'      => __( 'Insert into project', 'davejmoz' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project', 'davejmoz' ),
			'items_list'            => __( 'Projects list', 'davejmoz' ),
			'items_list_navigation' => __( 'Projects list navigation', 'davejmoz' ),
			'filter_items_list'     => __( 'Filter projects list', 'davejmoz' ),
		);
		$rewrite = array(
			'slug'                  => 'work',
			'with_front'            => false,
			'pages'                 => false,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Project', 'davejmoz' ),
			'description'           => __( 'Dave\'s various projects', 'davejmoz' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'post-formats', 'wpcom-markdown' ),
			'taxonomies'            => array( 'project-categories' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-hammer',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'projects', $args );

	}
	add_action( 'init', 'projects_custom_post_type', 0 );


	// Register Custom Taxonomy
	function projects_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'davejmoz' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'davejmoz' ),
			'menu_name'                  => __( 'Categories', 'davejmoz' ),
			'all_items'                  => __( 'All Categories', 'davejmoz' ),
			'parent_item'                => __( 'Parent Category', 'davejmoz' ),
			'parent_item_colon'          => __( 'Parent Category:', 'davejmoz' ),
			'new_item_name'              => __( 'New Category Name', 'davejmoz' ),
			'add_new_item'               => __( 'Add New Category', 'davejmoz' ),
			'edit_item'                  => __( 'Edit Category', 'davejmoz' ),
			'update_item'                => __( 'Update Category', 'davejmoz' ),
			'view_item'                  => __( 'View Category', 'davejmoz' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'davejmoz' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'davejmoz' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'davejmoz' ),
			'popular_items'              => __( 'Popular Categories', 'davejmoz' ),
			'search_items'               => __( 'Search Categories', 'davejmoz' ),
			'not_found'                  => __( 'Not Found', 'davejmoz' ),
			'no_terms'                   => __( 'No categories', 'davejmoz' ),
			'items_list'                 => __( 'Categories list', 'davejmoz' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'davejmoz' ),
		);
		$rewrite = array(
			'slug'                       => 'project-category',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'project-categories', array( 'projects' ), $args );

	}
	add_action( 'init', 'projects_taxonomy', 0 );


	/**
	 * Get 'project category' terms links.
	 *
	 * @see get_object_taxonomies()
	 */
	function project_categories_terms_links() {
		// Get post by post ID.
		if ( ! $post = get_post() ) {
			return '';
		}
	
		// Get post type by post.
		$post_type = $post->post_type;
	 
		// Get post type taxonomies.
		$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	 
		$out = array();
	 
		foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
	 
			// Get the terms related to post.
			$terms = get_the_terms( $post->ID, $taxonomy_slug );
	 
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%1$s" class="' . $taxonomy_slug . '">%2$s</a>',
						esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
						esc_html( $term->name )
					);
				}
			}
		}
		return implode( '', $out );
	}


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'davejmoz' ),
		'mobile' => esc_html__( 'Mobile Menu', 'davejmoz' ),
		'social' => esc_html__( 'Social Menu', 'davejmoz' ),
	) );

	// Add [menu name="" theme-location="" walker=""] shortcode
	// eg. [menu name="social-links" theme-location="social" walker="Walker_Social_Nav_Menu"]
	function insert_menu_shortcode( $atts ) {

		// Attributes
		$atts = shortcode_atts(
			array(
				'name' => 'null',
				'walker' => 'null',
				'theme-location' => 'null',
			),
			$atts,
			'menu'
		);
	
		return wp_nav_menu( array(
			'theme_location' => $atts['theme-location'],
			'menu_id' => $atts['name'],
			'walker' => $atts['walker'],
			'echo' => false,
		) );

	}
	add_shortcode( 'menu', 'insert_menu_shortcode' );

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
			$id = apply_filters( 'nav_menu_item_id', 'social-link-'. $item->ID, $item, $args );
			$linktitle = apply_filters( 'nav_menu_item_title', 'social-link-'. $item->attr_title, $item, $args );
			$idtag = $linktitle ? ' id="' . esc_attr( $linktitle ) . '"' : ' id="' . esc_attr( $id ) . '"';
			$output .= $indent . '<li '. $idtag .' '. $value .'>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$item_output = $args->before;
	        if (strpos($item->url, 'facebook') !== false) {
	            $item_output .= '<a'. $attributes .'><i class="fab fa-facebook-f">';
	            $item_output .= '</i></a>';
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

	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.2.0/js/all.js', array(), null );

	wp_enqueue_script( 'bigslide', get_template_directory_uri() . '/js/bigSlide.min.js', array('jquery'), '0.12.0', true );

	wp_enqueue_script( 'davejmoz-navigation', get_template_directory_uri() . '/js/navigation-min.js', array('bigslide'), '1.0', true );

	wp_enqueue_script( 'davejmoz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'davejmoz_scripts' );

/**
 * Filter the HTML script tags to add attributes.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @param string $src    The script's uri source.
 *
 * @return   Filtered HTML script tag.
 */
add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );

function add_attribs_to_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$async_scripts = array(
		'',
	);

	$defer_scripts = array( 
		'',
	);

	$fontawesome = array(
		'font-awesome',
	);

	$jquery = array(
		'jquery'
	);

    if ( in_array( $handle, $defer_scripts ) ) {
		return '<script defer src="' . $src . '" type="text/javascript"></script>' . "\n";
	}
	if ( in_array( $handle, $async_scripts ) ) {
		return '<script async src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
	}
	if ( in_array( $handle, $fontawesome ) ) {
		return '<script defer src="' . $src . '" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>' . "\n";
	}
	if ( in_array( $handle, $jquery ) ) {
		return '<script src="' . $src . '" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous" type="text/javascript"></script>' . "\n";
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
