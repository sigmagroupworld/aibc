<?php
add_action( 'admin_init', 'aibc_remove_menu_pages' );
function aibc_remove_menu_pages() {


  global $user_ID;
   remove_menu_page('edit.php'); // Posts
   remove_menu_page('edit-comments.php'); // Comments
   remove_menu_page('edit.php?post_type=elementor_library&tabs_group=library'); // Templates
	
}

// create a Custom post type news
add_action('init', 'aibc_news_custom_posts');
function aibc_news_custom_posts() {
	register_post_type('news-items', array(
		'labels' => array(
			'name' => 'News',
			'singular_name' => 'News',
			'menu_name' => 'News',
			'add_new' => 'Add News',
			'add_new_item' => 'Add News',
			'edit_item' => 'Edit News',
			'new_item' => 'Create News',
			'view_item' => 'View News',
			'search_items' => 'Search News',
			'not_found' => 'No News found',
			'not_found_in_trash' => 'No News found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'news'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for news post
add_action( 'init', 'aibc_taxonomies_news', 0 );
function aibc_taxonomies_news(){
	register_taxonomy('news-cat', array('news-items', 'page'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'News Categories',
				'singular_name' => 'News Category',
				'search_items' => 'Search News Category',
				'all_items' => 'All News Categories',
				'parent_item' => 'Parent News Category',
				'parent_item_colon' => 'Parent News Category:',
				'edit_item' => 'Edit News Category',
				'update_item' => 'Refresh News Category',
				'add_new_item' => 'Add News Category',
				'new_item_name' => 'New News Category'
			),
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'latest-news'),
        	'show_admin_column' => true
		)
	);
}

// create a Custom post tags for news post
// 
/*
add_action( 'init', 'aibc_tags_news', 0 );
function aibc_tags_news(){
	register_taxonomy('news-tag','news-items',
		array(
			'hierarchical'  => true,
			'labels' => array(
				'add_new_item' => 'Add New Tag',
				'new_item_name' => 'New Tag'
			),
			'label'         => 'News Tags',
			'singular_name' => 'News Tag',
			'rewrite'       => [
				'slug' => 'tags',
				'with_front' => false
			],
			'show_tagcloud' => true,
        	'show_admin_column' => true,
			'query_var'     => true
		)
	);
}*/

// Create CPT for authors
add_action('init', 'aibc_author_custom_posts');
function aibc_author_custom_posts(){
	register_post_type('authors', array(
		'labels' => array(
			'name' => 'Authors',
			'singular_name' => 'Author',
			'menu_name' => 'Authors',
			'add_new' => 'Add an Author',
			'add_new_item' => 'Add an Author',
			'edit_item' => 'Edit an Authors',
			'new_item' => 'Authors',
			'view_item' => 'View Authors',
			'search_items' => 'Search Authors',
			'not_found' => 'No Authors found',
			'not_found_in_trash' => 'No Authors found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'authors', 'with_front' => false),
		'supports' => array('title', 'thumbnail', 'editor')
	));
}

// create a Custom post type videos
add_action('init', 'aibc_videos_custom_posts');
function aibc_videos_custom_posts() {
	register_post_type('video-items', array(
		'labels' => array(
			'name' => 'Videos',
			'singular_name' => 'Video',
			'menu_name' => 'Videos',
			'add_new' => 'Add Video Item',
			'add_new_item' => 'Add Videos Item',
			'edit_item' => 'Edit Videos Item',
			'new_item' => 'Videos Items',
			'view_item' => 'View Videos Items',
			'search_items' => 'Search Videos Items',
			'not_found' => 'No Videos Items found',
			'not_found_in_trash' => 'No Videos Items found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'sigma-videos'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for videos
add_action( 'init', 'aibc_taxonomies_videos', 0 );
function aibc_taxonomies_videos(){
	register_taxonomy('videos-cat', array('video-items', 'page'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Video Categories',
				'singular_name' => 'Video Category',
				'search_items' => 'Search Video Category',
				'all_items' => 'All Video Categories',
				'parent_item' => 'Parent Video Category',
				'parent_item_colon' => 'Parent Video Category:',
				'edit_item' => 'Edit Video Category',
				'update_item' => 'Refresh Video Category',
				'add_new_item' => 'Add Video Category',
				'new_item_name' => 'New Video Category'
			),
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
        	'show_admin_column' => true,
			'rewrite' => array('slug' => 'sm-Video')
		)
	);
}

// create a Custom post type conference
add_action('init', 'aibc_conference_custom_posts');
function aibc_conference_custom_posts() {
	register_post_type('conference-items', array(
		'labels' => array(
			'name' => 'Conference',
			'singular_name' => 'Conference',
			'menu_name' => 'Conferences',
			'add_new' => 'Add Conference',
			'add_new_item' => 'Add Conference',
			'edit_item' => 'Edit Conference',
			'new_item' => 'Conferences',
			'view_item' => 'View Conference',
			'search_items' => 'Search Conferences',
			'not_found' => 'No Conferences found',
			'not_found_in_trash' => 'No Conferences found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'sigma-conference'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for conference
add_action( 'init', 'aibc_taxonomies_conference', 0 );
function aibc_taxonomies_conference(){
	register_taxonomy('conference-cat', array('conference-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Conference Categories',
				'singular_name' => 'Conference Category',
				'search_items' => 'Search Conference Category',
				'all_items' => 'All Conference Categories',
				'parent_item' => 'Parent Conference Category',
				'parent_item_colon' => 'Parent Conference Category:',
				'edit_item' => 'Edit Conference Category',
				'update_item' => 'Refresh Conference Category',
				'add_new_item' => 'Add Conference Category',
				'new_item_name' => 'New Conference Category'
			),
			'show_ui' => true,
        	'show_admin_column' => true,
			'rewrite' => array('slug' => 'sm-conference')
		)
	);
}

// create a Custom post type magazines
add_action('init', 'aibc_magazine_custom_posts');
function aibc_magazine_custom_posts() {
	register_post_type('magazine-items', array(
		'labels' => array(
			'name' => 'Magazines',
			'singular_name' => 'Magazine',
			'menu_name' => 'Magazines',
			'add_new' => 'Add Magazine Item',
			'add_new_item' => 'Add Magazine Item',
			'edit_item' => 'Edit Magazine Item',
			'new_item' => 'Magazines Items',
			'view_item' => 'View Magazine Item',
			'search_items' => 'Search Magazines Items',
			'not_found' => 'No Magazines Items found',
			'not_found_in_trash' => 'No Magazines Items found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'magazines'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for magazines
add_action( 'init', 'aibc_taxonomies_magazines', 0 );
function aibc_taxonomies_magazines(){
	register_taxonomy('magazines-cat', array('magazine-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Magazine Categories',
				'singular_name' => 'Magazine Category',
				'search_items' => 'Search Magazine Category',
				'all_items' => 'All Magazine Categories',
				'parent_item' => 'Parent Magazine Category',
				'parent_item_colon' => 'Parent Magazine Category:',
				'edit_item' => 'Edit Magazine Category',
				'update_item' => 'Refresh Magazine Category',
				'add_new_item' => 'Add Magazine Category',
				'new_item_name' => 'New Magazine Category'
			),
			'show_ui' => true,
        	'show_admin_column' => true,
			'rewrite' => array('slug' => 'magazines-cat')
		)
	);
}


//create a Custom post type People
add_action('init', 'aibc_people_custom_posts');
function aibc_people_custom_posts() {
	register_post_type('people-items', array(
		'labels' => array(
			'name' => 'People',
			'singular_name' => 'Person',
			'menu_name' => 'People',
			'add_new' => 'Add People',
			'add_new_item' => 'Add new Person',
			'edit_item' => 'Edit People',
			'new_item' => 'New Person',
			'view_item' => 'View People',
			'search_items' => 'Search People',
			'not_found' => 'No People found',
			'not_found_in_trash' => 'No People found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'people'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
		
	));
}
// create a Custom post taxonomy for people post
add_action( 'init', 'aibc_taxonomies_people', 0 );
function aibc_taxonomies_people(){
	register_taxonomy('people-cat', array('people-items'), array(
		'hierarchical' => true,
			'labels' => array(
				'name' => 'People Categories',
				'singular_name' => 'People Category',
				'search_items' => 'Search People Category',
				'all_items' => 'All People Categories',
				'parent_item' => 'Parent People Category',
				'parent_item_colon' => 'Parent People Category:',
				'edit_item' => 'Edit People Category',
				'update_item' => 'Refresh People Category',
				'add_new_item' => 'Add People Category',
				'new_item_name' => 'New People Category',
			),
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'latest-people')
		)
	);
}

// create a Custom post type Company
add_action('init', 'aibc_company_custom_posts');
function aibc_company_custom_posts() {
	register_post_type('company-items', array(
		'labels' => array(
			'name' => 'Company',
			'singular_name' => 'Companies',
			'menu_name' => 'Company',
			'add_new' => 'Add Company',
			'add_new_item' => 'Add Company',
			'edit_item' => 'Edit Company',
			'new_item' => 'Companies',
			'view_item' => 'View Companies',
			'search_items' => 'Search Companies',
			'not_found' => 'No Companies found',
			'not_found_in_trash' => 'No Companies found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'company'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for Company post
add_action( 'init', 'aibc_taxonomies_company', 0 );
function aibc_taxonomies_company(){
	register_taxonomy('company-cat', array('company-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Company Categories',
				'singular_name' => 'Company Category',
				'search_items' => 'Search Company Category',
				'all_items' => 'All Company Categories',
				'parent_item' => 'Parent Company Category',
				'parent_item_colon' => 'Parent Company Category:',
				'edit_item' => 'Edit Company Category',
				'update_item' => 'Refresh Company Category',
				'add_new_item' => 'Add Company Category',
				'new_item_name' => 'New Company Category'
			),
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'latest-company')
		)
	);
}

// create a Custom post type Sponsoring
add_action('init', 'aibc_sponsoring_custom_posts');
function aibc_sponsoring_custom_posts() {
	register_post_type('sponsoring-items', array(
		'labels' => array(
			'name' => 'Sponsoring',
			'singular_name' => 'Sponsoring',
			'menu_name' => 'Sponsoring',
			'add_new' => 'Add Sponsoring Item',
			'add_new_item' => 'Add Sponsoring Item',
			'edit_item' => 'Edit Sponsoring Item',
			'new_item' => 'Sponsoring Items',
			'view_item' => 'View Sponsoring Items',
			'search_items' => 'Search Sponsoring Items',
			'not_found' => 'No Sponsoring Items found',
			'not_found_in_trash' => 'No Sponsoring Items found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'sponsoring'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for Sponsoring post
add_action( 'init', 'aibc_taxonomies_sponsoring', 0 );
function aibc_taxonomies_sponsoring(){
	register_taxonomy('sponsoring-cat', array('sponsoring-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Sponsoring Categories',
				'singular_name' => 'Sponsoring Category',
				'search_items' => 'Search Sponsoring Category',
				'all_items' => 'All Sponsoring Categories',
				'parent_item' => 'Parent Sponsoring Category',
				'parent_item_colon' => 'Parent Sponsoring Category:',
				'edit_item' => 'Edit Sponsoring Category',
				'update_item' => 'Refresh Sponsoring Category',
				'add_new_item' => 'Add Sponsoring Category',
				'new_item_name' => 'New Sponsoring Category'
			),
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'latest-sponsoring')
		)
	);
}

// create a Custom post tags for sponsoring post
add_action( 'init', 'aibc_tags_sponsoring', 0 );
function aibc_tags_sponsoring(){
	register_taxonomy('sponsoring-tag','sponsoring-items',
		array(
			'hierarchical'  => true,
			'labels' => array(
				'add_new_item' => 'Add Sponsoring Tag',
				'new_item_name' => 'Sponsoring Tag'
			),
			'label'         => 'Sponsoring Tags',
			'singular_name' => 'Sponsoring Tag',
			'rewrite'       => [
				'slug' => 'tags',
				'with_front' => false
			],
			'show_tagcloud' => true,
			'show_admin_column' => true,
			'query_var'     => true
		)
	);
}

// create a Custom post type Sidebar Element
add_action('init', 'aibc_sidebar_element_custom_posts');
function aibc_sidebar_element_custom_posts() {
	register_post_type('sidebar-elements', array(
		'labels' => array(
			'name' => 'Sidebar Element',
			'singular_name' => 'Sidebar Element',
			'menu_name' => 'Sidebar Element',
			'add_new' => 'Add Sidebar Element',
			'add_new_item' => 'Add Sidebar Element',
			'edit_item' => 'Edit Sidebar Element',
			'new_item' => 'Sidebar Elements',
			'view_item' => 'View Sidebar Elements',
			'search_items' => 'Search Sidebar Elements',
			'not_found' => 'No Sidebar Elements found',
			'not_found_in_trash' => 'No Sidebar Elements found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'sidebar-elements'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for Hotel post
add_action( 'init', 'aibc_taxonomies_sidebar_elements', 0 );
function aibc_taxonomies_sidebar_elements(){
	register_taxonomy('sidebar-elements-cat', array('sidebar-elements'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Sidebar Element Categories',
				'singular_name' => 'Sidebar Element Category',
				'search_items' => 'Search Sidebar Element Category',
				'all_items' => 'All Sidebar Element Categories',
				'parent_item' => 'Parent Sidebar Element Category',
				'parent_item_colon' => 'Parent Sidebar Element Category:',
				'edit_item' => 'Edit Sidebar Element Category',
				'update_item' => 'Refresh Sidebar Element Category',
				'add_new_item' => 'Add Sidebar Element Category',
				'new_item_name' => 'New Sidebar Element Category'
			),
			'show_ui' => true,
			'rewrite' => array('slug' => 'latest-sidebar-elements'),
			'show_admin_column' => true
		)
	);
}

// create a Custom post type Hotel
add_action('init', 'aibc_hotel_custom_posts');
function aibc_hotel_custom_posts() {
	register_post_type('hotel-items', array(
		'labels' => array(
			'name' => 'Hotel',
			'singular_name' => 'Hotel',
			'menu_name' => 'Hotel',
			'add_new' => 'Add Hotel Item',
			'add_new_item' => 'Add Hotel Item',
			'edit_item' => 'Edit Hotel Item',
			'new_item' => 'Hotel Items',
			'view_item' => 'View Hotel Items',
			'search_items' => 'Search Hotel Items',
			'not_found' => 'No Hotel Items found',
			'not_found_in_trash' => 'No Hotel Items found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'hotels'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for Hotel post
add_action( 'init', 'aibc_taxonomies_hotel', 0 );
function aibc_taxonomies_hotel(){
	register_taxonomy('hotel-cat', array('hotel-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Hotel Categories',
				'singular_name' => 'Hotel Category',
				'search_items' => 'Search Hotel Category',
				'all_items' => 'All Hotel Categories',
				'parent_item' => 'Parent Hotel Category',
				'parent_item_colon' => 'Parent Hotel Category:',
				'edit_item' => 'Edit Hotel Category',
				'update_item' => 'Refresh Hotel Category',
				'add_new_item' => 'Add Hotel Category',
				'new_item_name' => 'New Hotel Category'
			),
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'latest-hotel')
		)
	);
}

// create a Custom post type Awards
add_action('init', 'aibc_awards_custom_posts');
function aibc_awards_custom_posts() {
	register_post_type('award-items', array(
		'labels' => array(
			'name' => 'Awards',
			'singular_name' => 'Award',
			'menu_name' => 'Awards',
			'add_new' => 'Add Award Item',
			'add_new_item' => 'Add Award Item',
			'edit_item' => 'Edit Award Item',
			'new_item' => 'Award Items',
			'view_item' => 'View Award Items',
			'search_items' => 'Search Award Items',
			'not_found' => 'No Award Items found',
			'not_found_in_trash' => 'No Award Items found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'awards'),		
		'supports' => array('title', 'thumbnail', 'editor', 'comments'),
	));
}

// create a Custom post taxonomy for Awards post
add_action( 'init', 'aibc_taxonomies_award', 0 );
function aibc_taxonomies_award(){
	register_taxonomy('award-cat', array('award-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Award Categories',
				'singular_name' => 'Award Category',
				'search_items' => 'Search Award Category',
				'all_items' => 'All Award Categories',
				'parent_item' => 'Parent Award Category',
				'parent_item_colon' => 'Parent Award Category:',
				'edit_item' => 'Edit Award Category',
				'update_item' => 'Refresh Award Category',
				'add_new_item' => 'Add Award Category',
				'new_item_name' => 'New Award Category'
			),
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'latest-award')
		)
	);
}


// create a Custom post type Gallery
add_action('init', 'aibc_gallery_custom_posts');
function aibc_gallery_custom_posts() {
	register_post_type('gallery-items', array(
		'labels' => array(
			'name' => 'Gallery',
			'singular_name' => 'Galleries',
			'menu_name' => 'Gallery',
			'add_new' => 'Add Gallery Item',
			'add_new_item' => 'Add Gallery Item',
			'edit_item' => 'Edit Gallery Item',
			'new_item' => 'Gallery Items',
			'view_item' => 'View Gallery Items',
			'search_items' => 'Search Gallery Items',
			'not_found' => 'No Gallery Items found',
			'not_found_in_trash' => 'No Gallery Items found in Trash',
		),
		'public' => TRUE,
		'rewrite' => array('slug' => 'gallery'),		
		'supports' => array( 'title', 'thumbnail', 'custom-fields' ),
	));
}

// create a Custom post taxonomy for Gallery post
add_action( 'init', 'aibc_taxonomies_gallery', 0 );
function aibc_taxonomies_gallery(){
	register_taxonomy('gallery-cat', array('gallery-items'), array('hierarchical' => true,
			'labels' => array(
				'name' => 'Gallery Categories',
				'singular_name' => 'Gallery Category',
				'search_items' => 'Search Gallery Category',
				'all_items' => 'All Gallery Categories',
				'parent_item' => 'Parent Gallery Category',
				'parent_item_colon' => 'Parent Gallery Category:',
				'edit_item' => 'Edit Gallery Category',
				'update_item' => 'Refresh Gallery Category',
				'add_new_item' => 'Add Gallery Category',
				'new_item_name' => 'New Gallery Category'
			),
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'latest-gallery')
		)
	);
}

function aibc_disable_autoupdate_slug($post_ID, $post, $update)
{
	/*
    if ($post->post_type == 'news-items') {
        $disable_autoupdate = get_post_meta($post->ID, 'disable_autoupdate_slug', true);

        if (empty($disable_autoupdate)) {
            // check the slug and run an update if necessary
            $new_slug = sanitize_title($post->post_title);
            if ($post->post_name != $new_slug) {
                wp_update_post(
                    array(
                        'ID' => $post->ID,
                        'post_name' => $new_slug
                    )
                );
            }
        }
    }
	*/
}
