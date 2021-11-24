<?php 

/*------------------------------------------------------------------------------------------------------------------*/
/*  Our Project Custom Post
/*------------------------------------------------------------------------------------------------------------------*/

add_action('init', 'our_project_init');

function our_project_init() {

  $labels = array(
    'name'               => _x( 'Our Project', 'post type general name', 'dustrial' ),
    'singular_name'      => _x( 'Project', 'post type singular name', 'dustrial' ),
    'menu_name'          => __( 'Our Project', 'dustrial' ),
    'name_admin_bar'     => __( 'Project', 'dustrial' ),
    'add_new'            => __( 'Add New', 'dustrial' ),
    'add_new_item'       => __( 'Add New Project', 'dustrial' ),
    'new_item'           => __( 'New Project', 'dustrial' ),
    'edit_item'          => __( 'Edit Project', 'dustrial' ),
    'view_item'          => __( 'View Project', 'dustrial' ),
    'all_items'          => __( 'All Projects', 'dustrial' ),
    'search_items'       => __( 'Search Our Project', 'dustrial' ),
    'parent_item_colon'  => __( 'Parent Our Project:', 'dustrial' ),
    'not_found'          => __( 'No Project found.', 'dustrial' ),
    'not_found_in_trash' => __( 'No Project found in Trash.', 'dustrial' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => null,
    'taxonomies'         => array( 'post_tag' ),
    'menu_icon'          => 'dashicons-portfolio',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  );

  register_post_type('our_project', $args);
}


function update_project_post_slug( $args, $post_type ) {
    $project_post_slug = dustrial_get_option('project_post_slug');
    if ( 'our_project' === $post_type ) {
        $my_args = array(
            'rewrite' => array( 'slug' => $project_post_slug, 'with_front' => false )
        );
        return array_merge( $args, $my_args );
    }
    return $args;
}
add_filter( 'register_post_type_args', 'update_project_post_slug', 10, 2 );


/* Texonomy
=====================================================*/

function create_our_project_taxonomies() {
  $labels = array(
    'name'              => _x( 'Project Category', 'Taxonomy plural name', 'dustrial' ),
    'singular_name'     => _x( 'Project Category', 'Taxonomy singular name', 'dustrial' ),
    'search_items'      => __( 'Search Project Category', 'dustrial' ),
    'popular_items'     => __( 'Popular Project Category', 'dustrial' ),
    'all_items'         => __( 'All Categories', 'dustrial' ),
    'parent_item'       => __( 'Parent Project Category', 'dustrial' ),
    'parent_item_colon' => __( 'Parent Project Category', 'dustrial' ),
    'edit_item'         => __( 'Edit Project Category', 'dustrial' ),
    'update_item'       => __( 'Update Project Category', 'dustrial' ),
    'add_new_item'      => __( 'Add New Category', 'dustrial' ),
    'new_item_name'     => __( 'New Project Menu Name', 'dustrial' ),
    'add_or_remove_items' => __( 'Add or remove Project Category', 'dustrial' ),
    'choose_from_most_used' => __( 'Choose from most used text-domain', 'dustrial' ),
    'menu_name'       => __( 'Category', 'dustrial' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'our_project_tax', array( 'our_project' ), $args );
}

add_action( 'init', 'create_our_project_taxonomies' );



/*------------------------------------------------------------------------------------------------------------------*/
/*  Our Service Custom Post
/*------------------------------------------------------------------------------------------------------------------*/

add_action('init', 'service_init');

function service_init() {
  
  $labels = array(
    'name'               => _x( 'Our Service', 'post type general name', 'dustrial' ),
    'singular_name'      => _x( 'Service', 'post type singular name', 'dustrial' ), 
    'menu_name'          => __( 'Our Service', 'dustrial' ),
    'name_admin_bar'     => __( 'Service', 'dustrial' ),
    'add_new'            => __( 'Add New', 'dustrial' ),
    'add_new_item'       => __( 'Add New Service', 'dustrial' ),
    'new_item'           => __( 'New Service', 'dustrial' ),
    'edit_item'          => __( 'Edit Service', 'dustrial' ),
    'view_item'          => __( 'View Service', 'dustrial' ),
    'all_items'          => __( 'All Services', 'dustrial' ),
    'search_items'       => __( 'Search Our Service', 'dustrial' ),
    'parent_item_colon'  => __( 'Parent Our Service:', 'dustrial' ),
    'not_found'          => __( 'No Service found.', 'dustrial' ),
    'not_found_in_trash' => __( 'No Service found in Trash.', 'dustrial' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'menu_position'      => null,
    'taxonomies'         => array( 'post_tag' ),
    'menu_icon'          => 'dashicons-admin-tools',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  );

  register_post_type('service', $args);
}


function update_service_slug( $args, $post_type ) {
    $service_post_slug = dustrial_get_option('service_post_slug');
    if ( 'service' === $post_type ) {
        $my_args = array(
            'rewrite' => array( 'slug' => $service_post_slug, 'with_front' => false )
        );
        return array_merge( $args, $my_args );
    }
    return $args;
}
add_filter( 'register_post_type_args', 'update_service_slug', 10, 2 );


/* Texonomy
=====================================================*/

function create_service_taxonomies() {
  $labels = array(
    'name'              => _x( 'Service Category', 'Taxonomy plural name', 'dustrial' ),
    'singular_name'     => _x( 'Service Category', 'Taxonomy singular name', 'dustrial' ),
    'search_items'      => __( 'Search Service Category', 'dustrial' ),
    'popular_items'     => __( 'Popular Service Category', 'dustrial' ),
    'all_items'         => __( 'All Categories', 'dustrial' ),
    'parent_item'       => __( 'Parent Service Category', 'dustrial' ),
    'parent_item_colon' => __( 'Parent Service Category', 'dustrial' ),
    'edit_item'         => __( 'Edit Service Category', 'dustrial' ),
    'update_item'       => __( 'Update Service Category', 'dustrial' ),
    'add_new_item'      => __( 'Add New Category', 'dustrial' ),
    'new_item_name'     => __( 'New Service Menu Name', 'dustrial' ),
    'add_or_remove_items' => __( 'Add or remove Service Category', 'dustrial' ),
    'choose_from_most_used' => __( 'Choose from most used text-domain', 'dustrial' ),
    'menu_name'       => __( 'Category', 'dustrial' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'service_cat', array( 'service' ), $args );
}

add_action( 'init', 'create_service_taxonomies' );



/*------------------------------------------------------------------------------------------------------------------*/
/*  Testimonial Custom Post
/*------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists('dustrial_testimonials_posttype')):
  function dustrial_testimonials_posttype() {
    register_post_type( 'testimonial',
      array(
        'labels' => array(
          'name'                 => __( 'Testimonials', 'dustrial' ),
          'singular_name'        => __( 'testimonial', 'dustrial' ),
          'add_new'              => __( 'Add New Testimonial', 'dustrial' ),
          'add_new_item'         => __( 'Add New Testimonial', 'dustrial' ),
          'edit_item'            => __( 'Edit Testimonial', 'dustrial' ),
          'new_item'             => __( 'Add New Testimonial', 'dustrial' ),
          'view_item'            => __( 'View Testimonial', 'dustrial' ),
          'search_items'         => __( 'Search Testimonial', 'dustrial' ),
          'not_found'            => __( 'No Testimonials found', 'dustrial' ),
          'not_found_in_trash'   => __( 'No Testimonials found in trash', 'dustrial' )
        ),
        'public'                 => true,
        'menu_icon'              =>'dashicons-format-quote',
        'supports'               => array( 'title', 'editor', 'thumbnail'),
        'capability_type'        => 'post',
        'rewrite' => array("slug"=> "testimonials")
      )
    );
  }
  add_action( 'init', 'dustrial_testimonials_posttype' );
endif;

/*------------------------------------------------------------------------------------------------------------------*/
/*  Team Custom Post
/*------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists('dustrial_teams_posttype')):
  function dustrial_teams_posttype() {
    register_post_type( 'team',
      array(
        'labels' => array(
          'name'                 => __( 'Team', 'dustrial' ),
          'singular_name'        => __( 'team', 'dustrial' ),
          'add_new'              => __( 'Add New Team', 'dustrial' ),
          'add_new_item'         => __( 'Add New Team', 'dustrial' ),
          'edit_item'            => __( 'Edit Team', 'dustrial' ),
          'new_item'             => __( 'Add New Team', 'dustrial' ),
          'view_item'            => __( 'View Team', 'dustrial' ),
          'search_items'         => __( 'Search Team', 'dustrial' ),
          'not_found'            => __( 'No Team found', 'dustrial' ),
          'not_found_in_trash'   => __( 'No Team found in trash', 'dustrial' )
        ),
        'public'                 => true,
        'menu_icon'              =>'dashicons-businessman',
        'supports'               => array( 'title', 'excerpt', 'thumbnail'),
        'capability_type'        => 'post',
        'rewrite' => array("slug"=> "teams")
      )
    );
  }
  add_action( 'init', 'dustrial_teams_posttype' );
endif;




/*------------------------------------------------------------------------------------------------------------------*/
/*  Our Gallery Custom Post
/*------------------------------------------------------------------------------------------------------------------*/

add_action('init', 'our_gallery_init');

function our_gallery_init() {

  $labels = array(
    'name'               => _x( 'Our Gallery', 'post type general name', 'dustrial' ),
    'singular_name'      => _x( 'Gallery', 'post type singular name', 'dustrial' ),
    'menu_name'          => __( 'Our Gallery', 'dustrial' ),
    'name_admin_bar'     => __( 'Gallery', 'dustrial' ),
    'add_new'            => __( 'Add New', 'dustrial' ),
    'add_new_item'       => __( 'Add New Gallery', 'dustrial' ),
    'new_item'           => __( 'New Gallery', 'dustrial' ),
    'edit_item'          => __( 'Edit Gallery', 'dustrial' ),
    'view_item'          => __( 'View Gallery', 'dustrial' ),
    'all_items'          => __( 'All Gallerys', 'dustrial' ),
    'search_items'       => __( 'Search Our Gallery', 'dustrial' ),
    'parent_item_colon'  => __( 'Parent Our Gallery:', 'dustrial' ),
    'not_found'          => __( 'No Gallery found.', 'dustrial' ),
    'not_found_in_trash' => __( 'No Gallery found in Trash.', 'dustrial' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'taxonomies'         => array( 'post_tag' ),
    'menu_icon'          => 'dashicons-images-alt2',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  );

  register_post_type('our_gallery', $args);
}


function update_gallery_post_slug( $args, $post_type ) {
    $gallery_post_slug = dustrial_get_option('gallery_post_slug');
    if ( 'our_gallery' === $post_type ) {
        $my_args = array(
            'rewrite' => array( 'slug' => $gallery_post_slug, 'with_front' => false )
        );
        return array_merge( $args, $my_args );
    }
    return $args;
}
add_filter( 'register_post_type_args', 'update_gallery_post_slug', 10, 2 );


/* Texonomy
=====================================================*/

function create_our_gallery_taxonomies() {
  $labels = array(
    'name'              => _x( 'Gallery Category', 'Taxonomy plural name', 'dustrial' ),
    'singular_name'     => _x( 'Gallery Category', 'Taxonomy singular name', 'dustrial' ),
    'search_items'      => __( 'Search Gallery Category', 'dustrial' ),
    'popular_items'     => __( 'Popular Gallery Category', 'dustrial' ),
    'all_items'         => __( 'All Categories', 'dustrial' ),
    'parent_item'       => __( 'Parent Gallery Category', 'dustrial' ),
    'parent_item_colon' => __( 'Parent Gallery Category', 'dustrial' ),
    'edit_item'         => __( 'Edit Gallery Category', 'dustrial' ),
    'update_item'       => __( 'Update Gallery Category', 'dustrial' ),
    'add_new_item'      => __( 'Add New Category', 'dustrial' ),
    'new_item_name'     => __( 'New Gallery Menu Name', 'dustrial' ),
    'add_or_remove_items' => __( 'Add or remove Gallery Category', 'dustrial' ),
    'choose_from_most_used' => __( 'Choose from most used text-domain', 'dustrial' ),
    'menu_name'       => __( 'Category', 'dustrial' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'our_gallery_tax', array( 'our_gallery' ), $args );
}

add_action( 'init', 'create_our_gallery_taxonomies' );




/* Others
=====================================================*/
function dustrial_get_page_as_list(){
    $args = wp_parse_args(array(
        'post_type' => 'page',
        'posts_per_page' => -1,
    ));

    /**
     * Parse incoming $args into an array and merge it with $defaults
     */

    $posts = get_posts( $args);

    $post_options = array(esc_html__('-- Select Page --', 'dustrial')=> '');
    if($posts){
        foreach ($posts as $post) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}

function dustrial_get_service_as_list(){

    $args = wp_parse_args(array(
        'post_type' => 'service',
        'posts_per_page' => -1,
    ));

    /**
     * Parse incoming $args into an array and merge it with $defaults
     */

    $posts = get_posts( $args);

    $post_options = array(esc_html__('-- Select Page --', 'dustrial')=> '');
    if($posts){
        foreach ($posts as $post) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}