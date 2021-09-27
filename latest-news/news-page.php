<?php
/**
 * Template Name: SigmaMT Latest News Page Layout
 * Created By: Rinkal Petersen
 * Created at: 22 Apr 2021
 */
/* Directory template css */
wp_enqueue_style('aibc-news-style', CHILD_DIR .'/latest-news/css/style.css');
wp_enqueue_style('aibc-modal-video-style', CHILD_DIR .'/latest-news/css/modal-video.min.css');
wp_enqueue_script('aibc-news-script', CHILD_DIR .'/latest-news/js/custom-home.js', array(), '2.0.0', true);
wp_enqueue_script('aibc-modal-video-script', CHILD_DIR .'/latest-news/js/jquery-modal-video.min.js', array(), '1.0.0', true);
get_header();
?>

<?php ob_start(); 
$desktop_banner = get_field('desktop_banner');
$taxonomy = __( 'news-cat', 'sigmaigaming' );
$placeholder = wp_get_attachment_image_url(99850);
$placeholder_full = wp_get_attachment_image_url(99850, 'full');
$row = 0;
$page_id = $wp_query->get_queried_object()->ID;
$post_count = '10';

$featured_posts = get_posts(array(
    'numberposts' => 4,
    'post_type' => 'news-items',
    'post_status' => 'publish',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => 'featured_post',
            'value' => 'yes',
            'compare' => 'LIKE'
        )
    ),
));

if ($desktop_banner){ ?>
    <div class="article-wrapper-slider">
        <?php foreach ($featured_posts as $featured_post) {
            $banner = get_field('banner_image', $featured_post->ID);
            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post->ID ), 'full' );
            $terms = get_the_term_list( $featured_post->ID, 'news-cat', '<span>', ', ', '</span>');
            $terms = strip_tags( $terms );
            ?>
            <div>
                <div class="post-item">
                    <?php if ($banner) {?>
                        <a href="<?php echo get_the_permalink($featured_post->ID); ?>"
                            style="background-image:url('<?php echo $banner; ?>') ">
                    <?php } else if ($featured_image) {?>
                        <a href="<?php echo get_the_permalink($featured_post->ID); ?>"
                           style="background-image:url('<?php echo $featured_image[0]; ?>') ">
                    <?php } else { ?>
                        <a href="<?php echo get_the_permalink($featured_post->ID); ?>"
                           style="background-image:url('<?php echo $placeholder_full; ?>') ">
                    <?php }?>
                            <div class="container">
                            <div>
                                <div class="top">
                                    <span class="tag">Featured</span>
                                    <span class="date">Added <?php echo get_the_date('j F Y', $featured_post->ID); ?></span>
                                    <span class="cats">Category: <?php echo $terms; ?></span>
                                </div>
                                <h2>
                                    <?php echo get_the_title($featured_post->ID); ?>
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
	<!-- News page banner start -->

	<!-- News page banner End -->

	<!-- News category menu start -->
	<section>
		<div class="container">
			<div class="home-news-menu">
				<div class="news-menu">
					<div class="mobile-pick">
						<ul>
							<li><?php echo $desktop_banner["all_categories_title"]; ?></li>
						</ul>
						<div class="btn">
							<div>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>
					<?php
					$menu_name = aibc_get_tags_menu();
					?>
					<ul>
						<?php foreach ( $menu_name as $k => $tag ) { ?>
			  				<li>
			  					<a href="<?php echo $tag->url; ?>"><?php echo $tag->title; ?></a>
			  				</li>
			  			<?php } ?>
		 			</ul>
				</div>
				<div class="news-search">
					<?php echo do_shortcode( '[aibc-wpbsearch]' ); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- News category menu end -->

	<!-- News Image top banner start -->
	<section class="sigma-news">
        <div class="container">
        	<div class="single-news">
	        	<?php
                if (!empty($desktop_banner["sigma_top_add"]) && isset($desktop_banner["sigma_top_add"])) {
                    foreach ($desktop_banner["sigma_top_add"] as $value) { ?>
                        <div class="all-news">
                            <a href="<?php echo $value['link']; ?>" target="_blank">
                                <img src="<?php echo $value['top_banner']; ?>" alt="">
                            </a>
                        </div>
                    <?php }
                }?>
	    	</div>
        </div>
    </section>
	<!-- News Image top banner end -->

	<!-- Latest blog section -->
	<section class="home-blog">
		<div class="container">
			<div class="home-news">
				<div class="latest-news hp-left">
					<?php
					$news_tags = aibc_get_news_tags_data('', $taxonomy, 14);
					?>
					<div class="h-title">
						<a href="#"><?php echo $desktop_banner["latest_posts_title"]; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
					</div>
		       		<?php
                    $row = 0;
	        		foreach ( $news_tags['term_data'] as $k => $post ) {
		        		setup_postdata( $post );
		        		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                        ?>
			            <div class="blog-listing-module">								
							<div class="post-item">
								<a href="<?php the_permalink(); ?>">
									<?php if($row === 0) {
									    if ($featured_image) { ?>
										<div class="thumb-img">
			                        		<img src="<?php echo $featured_image[0] ?>" alt="">
			                    		</div>
			                    	<?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php }
									} ?>
		                    		<h2 <?php if($row === 0) { ?> class="big" <?php } ?> ><?php the_title(); ?></h2>
								</a>
							</div>
						</div>							
						<?php $row++; ?>
						<?php wp_reset_postdata();
					} ?>
				</div>
				<div class="affiliate hp-center">
					<?php
					$news_tags = aibc_get_news_tags_data(6101, 'news-cat', 12);
					?>
					<div class="h-title">
						<a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
							<?php if(isset($news_tags['term_value']->name)) {
								echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
							<?php } ?>
						</a>
					</div>
					<div class="blog-listing-module">
						<?php
                        $row = 0;
						foreach ( $news_tags['term_data'] as $k => $post ) {
				        	setup_postdata( $post );
				        	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				        	?>
				        	<?php if($row === 0) { ?>
								<div class="post-item">
									<a href="<?php the_permalink(); ?>">
                                        <?php if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php } ?>
		                    			<h2><?php the_title(); ?></h2>
									</a>
								</div>
							<?php } else { ?>
								<div class="post-item">
									<a href="<?php the_permalink(); ?>">
			                    		<h2><?php the_title(); ?></h2>
									</a>
								</div>
							<?php } ?>
						<?php $row++; } ?>
					</div>
				</div>
				<div class="spotify hp-right">
					<?php
					$video_cat = aibc_get_video_term(121021);
			      	$term_id = $video_cat[0]->term_id;
					$videos = aibc_get_videos($term_id, 9);
					 if(!empty($videos)){
			        	$youtube_video_title = get_field('video_title', $videos[0]->ID);
					 }
			        $r = 0;
					?>

					<div class="h-title">
						<a href="https://www.youtube.com/channel/UCT-bWs37ujgbKvDM4k0dEyA" target="_blank">
							<?php echo $desktop_banner["watch_spotify_title"]; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
						</a>
					</div>
					<div class="blog-listing-module">
						<?php if(!empty($videos)) { 
							foreach ( $videos as $k => $video ) {
								$youtube_video_link = get_field('youtube_video_link',  $video->ID);
								$split_link = explode("/",$youtube_video_link);
								$split_video_ink = $split_link[4];
								$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'full' ); ?>
								<div class="post-item">
									<?php if($r === 0) { ?>
										<a href="<?php echo $youtube_video_link; ?>" data-video-id='<?php echo $split_video_ink; ?>' class="js-video-button" id="video_player">
											<?php if ($featured_image) {?>
	                                        <div class="thumb-img">
												<div class="top" style="background-image: url('<?php echo $featured_image[0] ?>')">
													<div class="play-btn"></div>
													<div id="meta"></div>
													<span><?php _e( '21.45', 'sigmaigaming' ); ?></span>
												</div>
				                    		</div>
	                                        <?php } else {?>
	                                        <div class="thumb-img">
	                                            <div class="top" style="background-image: url('<?php echo $placeholder_full ?>')">
	                                                <div class="play-btn"></div>
	                                                <div id="meta"></div>
	                                                <span><?php _e( '21.45', 'sigmaigaming' ); ?></span>
	                                            </div>
	                                        </div>
	                                        <?php } ?>
				                    		<h2 class="big"><?php echo $video->post_title; ?></h2>
										</a>
									<?php } else { ?>
										<a href="<?php echo $youtube_video_link; ?>" data-video-id='<?php echo $split_video_ink; ?>' class="js-video-button" id="video_player">
	                                        <?php if ($featured_image) {?>

	                                        <div class="thumb-img">
				                        		<div class="top" style="background-image: url('<?php echo $featured_image[0] ?>')">
													<div class="play-btn"></div>
												</div>
				                    		</div>
	                                        <?php } else {?>
	                                            <div class="thumb-img">
	                                                <div class="top" style="background-image: url('<?php echo $placeholder ?>')">
	                                                    <div class="play-btn"></div>
	                                                </div>
	                                            </div>
	                                        <?php } ?>
	                                        <h2><?php echo $video->post_title; ?></h2>
										</a>
									<?php } ?>
								</div>
						<?php $r++; 
						}
					}
					?>
					</div>
					<div class="">
						<?php echo $desktop_banner["executive_interview"]; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Latest blog section end -->

	<!-- News Image slider start -->
	<section class="sigma-news">
        <div class="container">
        	<div class="single-news">
	        	<?php
	        	if (!empty($desktop_banner["sigma_top_add"]) && isset($desktop_banner["sigma_top_add"])) {
	                foreach($desktop_banner["sigma_upcoming_add"] as $value) { ?>
		                <div class="all-news">
		                    <a href="#">
		                        <img src="<?php echo $value['latest_news_bottom_image']; ?>" alt="">
		                    </a>
		                </div>
			        <?php }
			    } ?>	
	    	</div>
        </div>
    </section>
	<!-- News Image slider end -->

    <!-- Latest blog section -->
    <section class="home-blog">
        <div class="container">
            <div class="home-news">
                <div class="latest-news hp-left">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6102, $taxonomy, 14);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    $row = 0;
                    foreach ( $news_tags['term_data'] as $k => $post ) {
                        setup_postdata( $post );
                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                        ?>
                        <div class="blog-listing-module">
                            <div class="post-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if($row === 0) {
                                        if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php }
                                    } ?>
                                    <h2 <?php if($row === 0) { ?> class="big" <?php } ?> ><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </div>
                        <?php $row++; ?>
                        <?php wp_reset_postdata();
                    } ?>
                </div>
                <div class="affiliate hp-center">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6107, 'news-cat', 6);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ( $news_tags['term_data'] as $k => $post ) {
                            setup_postdata( $post );
                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                            ?>
                            <?php if($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php $row++; } ?>
                        <div class="contribute-box">
                            <img alt="" src="/wp-content/uploads/2021/09/envelope-open-duotone.svg">
                            <h2>Want to contribute?</h2>
                            <p>Share your perspective</p>
                            <a href="http://sigma.world/en/contact/">Write to us!</a>
                        </div>
                    </div>
                </div>
                <div class="spotify hp-right">
                    <div class="h-title"><a href="#">Publications<i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a></div>
                    <div class="blog-listing-module">
                        <?php echo do_shortcode('[aibc-magazines appearance=latest-news post_per_page=2 term_id=1148]'); ?>
                        <img src="/wp-content/uploads/2021/09/post-magazine.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest blog section end -->

    <!-- News Image slider start -->
    <section class="sigma-news">
        <div class="container">
            <div class="single-news">
                <?php
                if (!empty($desktop_banner["sigma_asia_banners"]) && isset($desktop_banner["sigma_asia_banners"])) {
                    foreach($desktop_banner["sigma_asia_banners"] as $value) { ?>
                        <div class="all-news">
                            <a href="<?php echo $value['link']; ?>">
                                <img src="<?php echo $value['image']; ?>" alt="">
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <!-- News Image slider end -->

    <!-- Latest blog section -->
    <section class="home-blog">
        <div class="container">
            <div class="home-news">
                <div class="latest-news hp-left">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6109, $taxonomy, 8);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    $row = 0;
                    foreach ( $news_tags['term_data'] as $k => $post ) {
                        setup_postdata( $post );
                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                        ?>
                        <div class="blog-listing-module">
                            <div class="post-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if($row === 0) {
                                        if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php }
                                    } ?>
                                    <h2 <?php if($row === 0) { ?> class="big" <?php } ?> ><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </div>
                        <?php $row++; ?>
                        <?php wp_reset_postdata();
                    } ?>
                </div>
                <div class="affiliate hp-center">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6112, 'news-cat', 9);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ( $news_tags['term_data'] as $k => $post ) {
                            setup_postdata( $post );
                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                            ?>
                            <?php if($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php $row++; } ?>
                    </div>
                </div>
                <div class="spotify hp-right">
                    <?php $news_tags = aibc_get_news_tags_data(6136, $taxonomy, 6); ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>"><?php
                            echo $news_tags['term_value']->name ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ($news_tags['term_data'] as $k => $post) {
                            setup_postdata($post);
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            if ($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php echo get_permalink($post); ?>">
                                        <div class="thumb-img">
                                            <img src="<?php echo $featured_image[0] ?>"
                                                 alt="<?php echo $post->post_title ?>">
                                        </div>
                                        <h2><?php echo $post->post_title ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php echo get_permalink($post) ?>">
                                        <h2> <?php echo $post->post_title ?></h2>
                                    </a>
                                </div>
                            <?php }
                            $row++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest blog section end -->

    <!-- News Image slider start -->
    <section class="sigma-news">
        <div class="container">
            <div class="single-news">
                <?php
                if (!empty($desktop_banner["sigma_africa_banners"]) && isset($desktop_banner["sigma_africa_banners"])) {
                    foreach($desktop_banner["sigma_africa_banners"] as $value) { ?>
                        <div class="all-news">
                            <a href="<?php echo $value['link']; ?>">
                                <img src="<?php echo $value['image']; ?>" alt="">
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <!-- News Image slider end -->

    <!-- Latest blog section -->
    <section class="home-blog">
        <div class="container">
            <div class="home-news">
                <div class="latest-news hp-left">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6108, $taxonomy, 4);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    $row = 0;
                    foreach ( $news_tags['term_data'] as $k => $post ) {
                        setup_postdata( $post );
                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                        ?>
                        <div class="blog-listing-module">
                            <div class="post-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if($row === 0) {
                                        if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php }
                                    } ?>
                                    <h2 <?php if($row === 0) { ?> class="big" <?php } ?> ><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </div>
                        <?php $row++; ?>
                        <?php wp_reset_postdata();
                    } ?>
                </div>
                <div class="affiliate hp-center">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6100, 'news-cat', 6);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ( $news_tags['term_data'] as $k => $post ) {
                            setup_postdata( $post );
                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                            ?>
                            <?php if($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php $row++; } ?>
                    </div>
                </div>
                <div class="spotify hp-right">
                    <?php $news_tags = aibc_get_news_tags_data(6115, $taxonomy, 4); ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>"><?php
                            echo $news_tags['term_value']->name ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ($news_tags['term_data'] as $k => $post) {
                            setup_postdata($post);
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            if ($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php echo get_permalink($post); ?>">
                                        <div class="thumb-img">
                                            <img src="<?php echo $featured_image[0] ?>"
                                                 alt="<?php echo $post->post_title ?>">
                                        </div>
                                        <h2><?php echo $post->post_title ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php echo get_permalink($post) ?>">
                                        <h2> <?php echo $post->post_title ?></h2>
                                    </a>
                                </div>
                            <?php }
                            $row++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest blog section end -->

    <!-- News Image slider start -->
    <section class="sigma-news">
        <div class="container">
            <div class="single-news">
                <?php
                if (!empty($desktop_banner["sigma_americas_banners"]) && isset($desktop_banner["sigma_americas_banners"])) {
                    foreach($desktop_banner["sigma_americas_banners"] as $value) { ?>
                        <div class="all-news">
                            <a href="<?php echo $value['link']; ?>">
                                <img src="<?php echo $value['image']; ?>" alt="">
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <!-- News Image slider end -->

    <!-- Latest blog section -->
    <section class="home-blog">
        <div class="container">
            <div class="home-news">
                <div class="latest-news hp-left">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6103, $taxonomy, 4);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    $row = 0;
                    foreach ( $news_tags['term_data'] as $k => $post ) {
                        setup_postdata( $post );
                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                        ?>
                        <div class="blog-listing-module">
                            <div class="post-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if($row === 0) {
                                        if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php }
                                    } ?>
                                    <h2 <?php if($row === 0) { ?> class="big" <?php } ?> ><?php the_title(); ?></h2>
                                </a>
                            </div>
                        </div>
                        <?php $row++; ?>
                        <?php wp_reset_postdata();
                    } ?>
                </div>
                <div class="affiliate hp-center">
                    <?php
                    $news_tags = aibc_get_news_tags_data(6137, 'news-cat', 6);
                    ?>
                    <div class="h-title">
                        <a href="<?php echo get_tag_link($news_tags['term_value']->term_id); ?>">
                            <?php if(isset($news_tags['term_value']->name)) {
                                echo $news_tags['term_value']->name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ( $news_tags['term_data'] as $k => $post ) {
                            setup_postdata( $post );
                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                            $featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                            ?>
                            <?php if($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($featured_image) { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image[0] ?>" alt="">
                                            </div>
                                        <?php } else { ?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php $row++; } ?>
                    </div>
                </div>
                <div class="spotify hp-right">
                    <?php $news_tags = aibc_get_news_tags_data(6114, $taxonomy, 6); ?>
                    <div class="h-title">
                        <a href="#">Sponsor<i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="blog-listing-module">
                        <?php
                        $row = 0;
                        foreach ($news_tags['term_data'] as $k => $post) {
                            setup_postdata($post);
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            if ($row === 0) { ?>
                                <div class="post-item">
                                    <a href="<?php echo get_permalink($post); ?>">
                                        <div class="thumb-img">
                                            <img src="<?php echo $featured_image[0] ?>"
                                                 alt="<?php echo $post->post_title ?>">
                                        </div>
                                        <h2><?php echo $post->post_title ?></h2>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="post-item">
                                    <a href="<?php echo get_permalink($post) ?>">
                                        <h2> <?php echo $post->post_title ?></h2>
                                    </a>
                                </div>
                            <?php }
                            $row++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest blog section end -->

    <!-- News Image slider start -->
    <section class="sigma-news">
        <div class="container">
            <div class="single-news">
                <?php
                if (!empty($desktop_banner["sigma_upcoming_add"]) && isset($desktop_banner["sigma_upcoming_add"])) {
                    foreach($desktop_banner["sigma_upcoming_add"] as $value) { ?>
                        <div class="all-news">
                            <a href="#">
                                <img src="<?php echo $value['latest_news_bottom_image']; ?>" alt="">
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <!-- News Image slider end -->
<?php
}
?>

<?php echo do_shortcode('[aibc-newsletter]'); ?>

<?php get_footer(); ?>
