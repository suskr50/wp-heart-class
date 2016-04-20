<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">



			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<header class="article-header">

	<h1 class="page-title"><?php the_title(); ?></h1>
	


					</header> <?php // end article header ?>
<div class="m-all t-all d-5of7 cf">
									
					<section class="entry-content cf" itemprop="articleBody">
						<?php
										// the content (pretty self explanatory huh)
						the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
											) );
											?>
										</section> <?php // end article section ?>

										<footer class="article-footer cf">

										</footer>

										<?php comments_template(); ?>
									<?php endwhile; endif; ?>	

									
								</div>


								<section >

									<?php 

									$a = array('Monday','Tuesday','Wednesday','Thursday','Friday');
									foreach ($a as $day) {

									$args = array(
										'posts_per_page'	=> -1,
										'post_type'		=> 'custom2_type',
										'meta_key'		=> 'class_day',
										'meta_value'	=> $day
										);
								

									$the_query = new WP_Query( $args );

									?>
									<?php if( $the_query->have_posts() ): ?>
										

										<h2> <?php echo $day; ?></h2>
									

										
										<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
											<?php  $class_day = get_field('class_day');
											$class_time = get_field('class_time');
											$post_object = get_field('teacher');
											$url = get_the_permalink();
											$class_name = get_the_title();



											if( $post_object ): 
															// override $post
														$post = $post_object;
														setup_postdata( $post ); 
														$teacher_name = get_the_title();
														
														?>
														
													<?php wp_reset_postdata();?>
													<?php endif;
												
													 // end while ?>

											<div class="individual-class cf">
														<div class="time">
															<p> <?php echo $class_time; ?></p>
														</div>
											             <div class="class-name">
											                 <p><strong> <?php echo $class_name; ?></strong><br><em><?php echo $teacher_name; ?></em></p>
											             </div>
											             <div class="btn">
											             	
											                 <a href="<?php echo $url; ?>">See Details</a>
											                 
											             </div>
											             <div class="clear"></div>

											         </div>
											
										
											
											


												

											<?php endwhile; ?>
										
									<?php endif; ?>

									<?php wp_reset_query();	?>


									<?php } ?> 
								</section>

							

								<?php get_sidebar(); ?>	

								
</article>
						</main>


				</div>

			</div>

<?php get_footer(); ?>
