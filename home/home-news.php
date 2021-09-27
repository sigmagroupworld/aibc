<?php global $desktop_banner, $row; ?>

<?php 
$taxonomy = 'news-cat';
$placeholder = wp_get_attachment_image_url(99850);
$placeholder_full = wp_get_attachment_image_url(99850, 'full');
$europe = '<section class="home-blog">
	<div class="container">
		<div class="home-news">';
			$news_tags = aibc_get_news_tags_data(6102, $taxonomy, 12);
			$europe .= '<div class="latest-news hp-left">
				<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' . 
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>';
				$row = 0;
        		foreach ( $news_tags['term_data'] as $k => $post ) {
	        		setup_postdata( $post );
	        		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		            $europe .= '<div class="blog-listing-module">								
						<div class="post-item">
							<a href="' . get_permalink($post) . '">';
								if($row === 0) {
								    if ($featured_image) {
                                        $europe .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                                    } else {
                                        $europe .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                                    }
		                    	}
	                    		$europe .= '<h2 '; 
								if($row === 0) { $europe .= 'class="big"'; } 
								$europe .= '>' . $post->post_title . '</h2>
							</a>
						</div>
					</div>';							
					$row++;
					wp_reset_postdata();
				}
			$europe .= '</div>
			<div class="affiliate hp-center">';
				$news_tags = aibc_get_news_tags_data(6107, $taxonomy, 9);
				$europe .= '<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' .
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						if($row === 0) {
							$europe .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">
									<div class="thumb-img">';
										if(!empty($featured_image)){
		                        			$europe .= '<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">';
										} else {
                                            $europe .= '<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">';
                                        }
		                    		$europe .= '</div>
	                    			<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$europe .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
                            $europe .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
					$europe .= '<div class="contribute-box" id="contribute-homepage"><div class="crypto-email">
									<p><img src="'.$desktop_banner['crypto_email_section']['image'].'" alt="envelope-open-duotone" style="width: 27px;" width="27"></p>
									<h2>'.$desktop_banner['crypto_email_section']['title'].'</h2>
									<p>'.$desktop_banner['crypto_email_section']['text'].'</p>
									<div class="button1">
										<a href="'.$desktop_banner['crypto_email_section']['button']['link'].'" target="_blank">'.$desktop_banner['crypto_email_section']['button']['text'].'</a>
									</div>
								</div>';
				$europe .= '</div></div>
			</div>
			<div class="spotify hp-right">';
				$europe .= '<div class="h-title">
					<a href="/magazine/" target="_blank">' .
						$desktop_banner["publication_title"]['title'] . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="magazine-section">
					<div class="sigma-magazines testimonial-slide-home">';
						$sigma_magazines = aibc_get_magazines(1148);
						foreach($sigma_magazines as $k => $item) {
							$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'full' );
							$title = get_field('title', $item->ID);
							$subtitle = get_field('subtitle', $item->ID);

							$europe .= '<figure class="testimonial">';
								if(!empty($featured_image)){
									$europe .= '<img src="' . $featured_image[0] . '" alt="' . $item->post_title . '" />';
								} else {
                                    $europe .= '<img src="' . $placeholder_full . '" alt="' . $item->post_title . '" />';
                                }
                            $europe .= '<div class="titlewrap">
					            			<h5>'.$title.'</h5>
					            			<h6>'.$subtitle.'</h6>
					          			</div>';
							$europe .= '</figure>';
						}
					$europe .= '</div>
				<div class="publication-image">
					<img src="/wp-content/uploads/2021/09/post-magazine.webp">
				</div>
			</div>
		</div>
	</div>
</section>'; ?>
<!-- Europe news section end-->

<!-- Asia news section -->
<?php 
$asia = '<section class="home-blog">
	<div class="container">
		<div class="home-news">';
			$news_tags = aibc_get_news_tags_data(6109, $taxonomy, 12);
			$asia .= '<div class="latest-news hp-left">
				<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' . 
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>';
				$row = 0;
        		foreach ( $news_tags['term_data'] as $k => $post ) {
	        		setup_postdata( $post );
	        		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		            $asia .= '<div class="blog-listing-module">								
						<div class="post-item">
							<a href="' . get_permalink($post) . '">';
								if($row === 0) {
									$asia .= '<div class="thumb-img">';
									
										if(!empty($featured_image)){
		                        			$asia .= '<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">';
										} else {
                                            $asia .= '<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">';
                                        }
		                    		$asia .= '</div>';
		                    	}
	                    		$asia .= '<h2 '; 
								if($row === 0) { $asia .= 'class="big"'; } 
								$asia .= '>' . $post->post_title . '</h2>
							</a>
						</div>
					</div>';							
					$row++;
					wp_reset_postdata();
				}
			$asia .= '</div>
			<div class="affiliate hp-center">';
				$news_tags = aibc_get_news_tags_data(6112, $taxonomy, 6);
				$asia .= '<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' .
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						//$featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						if($row === 0) {
							$asia .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
                            if ($featured_image) {
                                $asia .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $asia .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
                            $asia .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$asia .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
                            $asia .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
				$asia .= '</div>
			</div>
			<div class="spotify hp-right">';
				$news_tags = aibc_get_news_tags_data(6118, $taxonomy, 12);
				$asia .= '<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' .
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	//$featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			        	if($row === 0) {
							$asia .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							if ($featured_image) {
                                $asia .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $asia .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
                            $asia .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$asia .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							/*if ($featured_image_thumb) {
                                $asia .= '<div class="thumb-img">
		                        		<img src="' . $featured_image_thumb[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $asia .= '<div class="thumb-img">
		                        		<img src="' . $placeholder . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }*/
                            $asia .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
				$asia .= '</div>
			</div>
		</div>
	</div>
</section>'; ?>
<!-- Asia news section end-->

<!-- America news section -->
<?php 
$americas = '<section class="home-blog">
	<div class="container">
		<div class="home-news">';
			$news_tags = aibc_get_news_tags_data(6108, $taxonomy, 12);
			$americas .= '<div class="latest-news hp-left">
				<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' . 
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>';
				$row = 0;
        		foreach ( $news_tags['term_data'] as $k => $post ) {
	        		setup_postdata( $post );
	        		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		            $americas .= '<div class="blog-listing-module">								
						<div class="post-item">
							<a href="' . get_permalink($post) . '">';
								if($row === 0) {
								    if ($featured_image) {
                                        $americas .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                                    } else {
                                        $americas .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                                    }
		                    	}
	                    		$americas .= '<h2 '; 
								if($row === 0) { $americas .= 'class="big"'; } 
								$americas .= '>' . $post->post_title . '</h2>
							</a>
						</div>
					</div>';							
					$row++;
					wp_reset_postdata();
				}
$americas .= '</div>
			<div class="affiliate hp-center">';
				$news_tags = aibc_get_news_tags_data(6100, $taxonomy, 5);
				$americas .= '<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' .
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						//$featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						if($row === 0) {
							$americas .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							if ($featured_image) {
                                $americas .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $americas .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
                            $americas .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$americas .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							$americas .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
$americas .= '</div>
			</div>
			<div class="spotify hp-right">';
				$news_tags = aibc_get_news_tags_data(6115, $taxonomy, 12);
				$americas .= '<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' .
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	//$featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			        	if($row === 0) {
							$americas .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							if ($featured_image) {
                                $americas .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $americas .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
                            $americas .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$americas .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
								/*
									<div class="thumb-img">';
										if(!empty($featured_image_thumb)){
		                        			$americas .= '<img src="' . $featured_image_thumb[0] . '" alt="' . $post->post_title . '">';
										} else {
                                            $americas .= '<img src="' . $placeholder . '" alt="' . $post->post_title . '">';
                                        }
		                    		$americas .= '</div> */
							$americas .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
				$americas .= '</div>
			</div>
		</div>
	</div>
</section>'; ?>
<!-- America news section end-->

<!-- Africa news section -->
<?php 
$africa = '<section class="home-blog">
	<div class="container">
		<div class="home-news">';
			$news_tags = aibc_get_news_tags_data(6103, $taxonomy, 13);
			$africa .= '<div class="latest-news hp-left">
				<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' . 
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>';
				$row = 0;
        		foreach ( $news_tags['term_data'] as $k => $post ) {
	        		setup_postdata( $post );
	        		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		            $africa .= '<div class="blog-listing-module">								
						<div class="post-item">
							<a href="' . get_permalink($post) . '">';
								if($row === 0) {
									$africa .= '<div class="thumb-img">';
										if(!empty($featured_image)){
		                        			$africa .= '<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">';
										} else {
                                            $africa .= '<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">';
                                        }
		                    		$africa .= '</div>';
		                    	}
	                    		$africa .= '<h2 '; 
								if($row === 0) { $africa .= 'class="big"'; } 
								$africa .= '>' . $post->post_title . '</h2>
							</a>
						</div>
					</div>';							
					$row++;
					wp_reset_postdata();
				}
			$africa .= '</div>
			<div class="affiliate hp-center">';
				$news_tags = aibc_get_news_tags_data(6137, $taxonomy, 12);
				$africa .= '<div class="h-title">
					<a href="' . get_tag_link($news_tags['term_value']->term_id) . '">' .
						$news_tags['term_value']->name . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						//$featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						if($row === 0) {
							$africa .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							if ($featured_image) {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
                            $africa .='<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$africa .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							/*
							if ($featured_image_thumb) {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $featured_image_thumb[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $placeholder . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
							*/
                            $africa .='<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
				$africa .= '</div>
			</div>
			<div class="spotify hp-right">';
				$news_tags = aibc_get_news_tags_data(6114, $taxonomy, 12);
				if(!empty($news_tags['term_value']->term_id)) {
					$termID = $news_tags['term_value']->term_id;
				} else {
					$termID = '';
				}
				if(!empty($news_tags['term_value']->name)) {
					$termName = $news_tags['term_value']->name;
				} else {
					$termName = '';
				}
				$africa .= '<div class="h-title">
					<a href="' . get_tag_link($termID) . '">' .
						$termName . '<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="blog-listing-module">';
					$row = 0;
					foreach ( $news_tags['term_data'] as $k => $post ) {
			        	setup_postdata( $post );
			        	//$featured_image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			        	if($row === 0) {
							$africa .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							if ($featured_image) {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $featured_image[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $placeholder_full . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
                            $africa .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						} else {
							$africa .= '<div class="post-item">
								<a href="' . get_permalink($post) . '">';
							/*
							if ($featured_image_thumb) {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $featured_image_thumb[0] . '" alt="' . $post->post_title . '">
		                    		</div>';
                            } else {
                                $africa .= '<div class="thumb-img">
		                        		<img src="' . $placeholder . '" alt="' . $post->post_title . '">
		                    		</div>';
                            }
							*/
                                $africa .= '<h2>' . $post->post_title . '</h2>
								</a>
							</div>';
						}
						$row++; 
					}
				$africa .= '</div>
			</div>
		</div>
	</div>
</section>'; ?>

<?php

echo do_shortcode( '[aibc-banner-adds banner_add="second_banners" page_id='.$page_id.']' ) .$europe . do_shortcode( '[aibc-banner-adds banner_add="third_banners" page_id='.$page_id.']' ) . $asia . do_shortcode( '[aibc-banner-adds banner_add="fourth_banners" page_id='.$page_id.']' ) . $americas . do_shortcode( '[aibc-banner-adds banner_add="fifth_banners" page_id='.$page_id.']' ) . $africa . do_shortcode( '[aibc-banner-adds banner_add="sixth_banners" page_id='.$page_id.']' );


/*$sort = isset($_GET['front_page_sort']) ?  $_GET['front_page_sort'] : '';
if($sort == 'asia'){
	echo $asia . do_shortcode( '[aibc-banner-adds banner_add="first_banners" page_id='.$page_id.']' ) . $europe . do_shortcode( '[aibc-banner-adds banner_add="second_banners" page_id='.$page_id.']' ) . $americas .  do_shortcode( '[aibc-banner-adds banner_add="third_banners" page_id='.$page_id.']' ) . $africa . do_shortcode( '[aibc-banner-adds banner_add="fourth_banners" page_id='.$page_id.']' );
} else if($sort == 'americas'){
	echo $americas . do_shortcode( '[aibc-banner-adds banner_add="third_banners" page_id='.$page_id.']' ) . $europe . do_shortcode( '[aibc-banner-adds banner_add="second_banners" page_id='.$page_id.']' ) . $asia . do_shortcode( '[aibc-banner-adds banner_add="first_banners" page_id='.$page_id.']' ) . $africa . do_shortcode( '[aibc-banner-adds banner_add="sigma_africa_banners" page_id='.$page_id.']' );
} else if($sort == 'africa'){
	echo $africa . do_shortcode( '[aibc-banner-adds banner_add="fourth_banners" page_id='.$page_id.']' ) . $europe . do_shortcode( '[aibc-banner-adds banner_add="second_banners" page_id='.$page_id.']' ) . $asia . do_shortcode( '[aibc-banner-adds banner_add="first_banners" page_id='.$page_id.']' ) . $americas . do_shortcode( '[aibc-banner-adds banner_add="third_banners" page_id='.$page_id.']' );
} else{
	echo $europe . do_shortcode( '[aibc-banner-adds banner_add="second_banners" page_id='.$page_id.']' ) . $asia . do_shortcode( '[aibc-banner-adds banner_add="first_banners" page_id='.$page_id.']' ) . $americas . do_shortcode( '[aibc-banner-adds banner_add="third_banners" page_id='.$page_id.']' ) . $africa . do_shortcode( '[aibc-banner-adds banner_add="fourth_banners" page_id='.$page_id.']' );
}*/
?>