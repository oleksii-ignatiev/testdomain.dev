<?php
add_action( 'wp_enqueue_scripts', 'twentyseventeenchild_enqueue_styles', 101 );

function twentyseventeenchild_enqueue_styles() {
	
 	wp_enqueue_style( 'parent-style', get_template_directory_uri() .'/style.css' );
	
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() .'/style.css' );
	
	if ( is_rtl() ) {
		wp_enqueue_style( 'parent-rtl', get_template_directory_uri() . '/rtl.css' );
		wp_enqueue_style( 'child-rtl', get_stylesheet_directory_uri() .'/rtl.css' );
		$styles['woocommerce-twenty-seventeen-rtl'] = array(
			'src'     => str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/css/twenty-seventeen-rtl.css',
			'deps'    => '',
			'version' => WC_VERSION,
			'media'   => 'all',
		);
		apply_filters( 'woocommerce_twenty_seventeen_styles', $styles );
	}
}




add_action( 'wp_enqueue_scripts', 'twentyseventeenchild_enqueue_scripts', 101 );
function twentyseventeenchild_enqueue_scripts() {
 	wp_enqueue_script( 'child-style', get_stylesheet_directory_uri() .'/script.js', array('jquery'), NULL, true );
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30 );


add_action('init', 'register_post_types');
function register_post_types(){
	register_post_type('books', array(
		'label'  => 'books',
		'labels' => array(
			'name'               => 'Books', 
			'singular_name'      => 'Book',
			'add_new'            => 'Add Book',
			'add_new_item'       => 'Add New Book', 
			'edit_item'          => 'Edit Book', 
			'menu_name'          => 'Books',
		),
		'description'         => 'Books, Books and Books',
		'public'              => true,
		'publicly_queryable'  => true, 
		'exclude_from_search' => false, 
		'show_ui'             => true, 
		'show_in_menu'        => true, 
		'show_in_admin_bar'   => true, 
		'show_in_nav_menus'   => true, 
		'show_in_rest'        => false, 
		'rest_base'           => false, 
		'menu_position'       => 5,
		'menu_icon'           => null, 
		'hierarchical'        => false,
		'supports'            => array('title','editor','author','thumbnail','excerpt','custom-fields','comments','revisions','page-attributes','post-formats'),
		'taxonomies'          => array('taxonomy'),
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action('init', 'create_taxonomy');
function create_taxonomy(){

	register_taxonomy('genre', array('books'), array(
		'label'                 => '', 
		'labels'                => array(
			'name'              => 'Genres',
			'singular_name'     => 'Genre',
			'search_items'      => 'Search Genres',
			'all_items'         => 'All Genres',
			'view_item '        => 'View Genre',
			'parent_item'       => 'Parent Genre',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Edit Genre',
			'update_item'       => 'Update Genre',
			'add_new_item'      => 'Add New Genre',
			'new_item_name'     => 'New Genre Name',
			'menu_name'         => 'Genre',
		),
		'description'           => '', 
		'public'                => true,
		'publicly_queryable'    => null, 
		'show_in_nav_menus'     => true, 
		'show_ui'               => true, 
		'show_in_menu'          => true, 
		'show_tagcloud'         => true, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'_builtin'              => false,
		'show_in_quick_edit'    => null, 
	) );
}