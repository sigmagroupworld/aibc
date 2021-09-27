<?php
/**
 * Template Name: AIBC Home Page Layout
 * Created By: Rinkal Petersen
 * Created at: 22 Apr 2021
 */
/* Directory template css */
wp_enqueue_style('aibc-home-style', CHILD_DIR .'/home/css/style.css'); 
wp_enqueue_style('aibc-modal-video-style', CHILD_DIR .'/home/css/modal-video.min.css'); 
wp_enqueue_script('aibc-home-script', CHILD_DIR .'/home/js/custom-home.js', array(), '1.0.0', true);
wp_enqueue_script('aibc-modal-video-script', CHILD_DIR .'/home/js/jquery-modal-video.min.js', array(), '1.0.0', true);
get_header();
?>

<?php ob_start(); $desktop_banner = get_field('desktop_banner');

$taxonomy = __( 'news-cat', 'sigmaigaming' );
$placeholder = wp_get_attachment_image_url(99850);
$placeholder_full = wp_get_attachment_image_url(99850, 'full');
$row = 0;
$page_id = $wp_query->get_queried_object()->ID;

if ($desktop_banner){ ?>
	<!-- Home page banner start -->
	<section class="home-banner-new ss" style="background-image: url(<?php echo $desktop_banner['banner_background_image']; ?>);">
		<div class="banner-container">
			<!-- Desktop banner start -->
			<div class="desktop-banner">
				<div class="top-logo">
					<h1>
						<span data-token-index="0" data-reactroot="">
							<img src="<?php echo $desktop_banner['aibc_logo']; ?>" alt="AIBC-Homepage-Logo-White">
							<?php echo $desktop_banner['aibc_banner_title']; ?>
						</span>
					</h1>
					<p style="font-size: 16px; color: #ffffff;"><br><?php echo $desktop_banner['banner_text']; ?></p>
				</div>
				<div class="bottom-logo">
					<?php 
					if(!empty($desktop_banner['banner_continents'])) {
						foreach($desktop_banner['banner_continents'] as $k => $value) { 
							#echo '<pre>'; print_r($value); echo '</pre>'; ?>
							<div class="event-boxes">
								<section class="event-box">
									<a href="<?php echo $value['link']; ?>">
										<div class="img">
											<img src="<?php echo $value['logo']; ?>" width="140" height="140">
										</div>
										<div class="content-wrapper">
											<h6><strong class="homeTitles"><?php echo $value['title']; ?></strong></h6>
											<div>
												<p><?php echo $value['expo_title']; ?></p>
												<p><?php echo $value['expo_date']; ?></p>
											</div>
										</div>
									</a>
								</section>
							</div>
					<?php }
					} ?>
				</div>
			</div>
			<!-- Desktop banner end -->
		</div>
	</section>
	<!-- Home page banner End -->
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

	<!-- News Image slider start -->
	<section class="sigma-news">
        <div class="container">
        	<div class="single-news">
	        	<?php if(!empty($desktop_banner["first_banners"])){
					foreach($desktop_banner["first_banners"] as $value) { ?>
						<div class="all-news">
							<a href="<?php echo $value['link']; ?>" target="_blank">
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
	<section class="home-blog latest-news">
		<div class="container">
			<div class="home-news">
				<div class="latest-news hp-left">
					<?php
					$news_tags = aibc_get_news_tags_data('', $taxonomy, 14);
					?>
					<div class="h-title">
						<a href="<?php echo site_url() . '/news' ?>"><?php echo $desktop_banner["latest_posts_title"]; ?></a>
					</div>
		       		<?php
	        		foreach ( $news_tags['term_data'] as $k => $post ) {
		        		setup_postdata( $post );
		        		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			            ?>
			            <div class="blog-listing-module">								
							<div class="post-item">
								<a href="<?php the_permalink(); ?>">
									<?php if($row === 0) { ?>
										<div class="thumb-img">
											<?php if(!empty($featured_image)){ ?>
			                        		    <img src="<?php echo $featured_image[0] ?>" alt="">
											<?php } else { ?>
                                                <img src="<?php echo $placeholder_full ?>" alt="">
                                            <?php } ?>
			                    		</div>
			                    	<?php } ?>
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
					$news_tags = aibc_get_news_tags_data(6101, $taxonomy, 12);
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
				        	<?php if($row == 0) { ?>
								<div class="post-item">
									<a href="<?php the_permalink(); ?>">
                                        <?php if ($featured_image) {?>
										<div class="thumb-img">
			                        		<img src="<?php echo $featured_image[0] ?>" alt="">
			                    		</div>
                                    <?php } else {?>
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
                                        <?php if ($featured_image_thumb) {?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $featured_image_thumb[0] ?>" alt="">
                                            </div>
                                        <?php } else {?>
                                            <div class="thumb-img">
                                                <img src="<?php echo $placeholder ?>" alt="">
                                            </div>
                                        <?php } ?>
			                    		<h2><?php the_title(); ?></h2>
									</a>
								</div>
							<?php } ?>
						<?php $row++; } ?>
					</div>
				</div>
				<div class="spotify hp-right">
					<?php
					$video_cat = aibc_get_video_term($page_id);
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

<?php
}
?>

<?php aibc_mt_get_continent_order($page_id); ?>

<div class="home-page popup close">
	<div class="popupinner">
		<img src="/wp-content/uploads/2021/09/Malta-Week-Pop-up-Banner.webp">
		<a href="https://sigmamalta.events/sigma-malta-2021" target="_blank" class="tl"></a>
		<a href="https://sigmamalta.events/aibc-europe" target="_blank" class="tr"></a>
		<a href="https://sigmamalta.events/malta-affiliate-grand-slam" target="_blank" class="bl"></a>
		<a href="https://sigmamalta.events/med-tech-europe" target="_blank" class="br"></a>
		<div class="close">
			<a class="close-popup">❌</a>
		</div>
	</div>
</div>

<?php echo do_shortcode('[aibc-newsletter]'); ?>

<?php get_footer(); ?>