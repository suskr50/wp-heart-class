<?php
/*
 Template Name: Custom Page Example
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

								<!-- 	<h1 class="page-title"><?php the_title(); ?></h1>

									<p class="byline vcard">
										<?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p> -->


								</header>

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
										/*wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );*/
									?>
								</section>


								<!-- <footer class="article-footer">

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> -->

							<!-- 	<?php comments_template(); ?>
 -->
							

							<?php endwhile; else : ?>

									<!-- <article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article> -->

							<?php endif; ?>

						

							<div class="team-bio m-all t-all d-all">
								<div class="cf"></div>
									<hr>
									<h1> Our Teachers </h1>
										<?php query_posts('posts_per_page=6&post_type=custom_type')?>
										<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

											<div class="teacher-wrapper m-all t-1of2 d-1of4 ">

												<div class="teacher-picture m-1of3 t-all d-all">
													<?php the_post_thumbnail();?>
												</div>

												<div class="teacher-title m-2of3 t-all d-all">
													<a href="<?php  the_permalink();?>"><?php the_title(); ?></a>

												<?php	
													$i = 1;
													while ($i <= 3) {

													$post_object = get_field('class_'.$i);
													if( $post_object ): 
															// override $post
														$post = $post_object;
														setup_postdata( $post ); 
														?>
														<div class="teacher-classes">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</div>
													<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
													<?php endif;
													$i = $i+1;
													} // end while ?>
											</div>

											<div class="teacher-text m-all t-1of2 d-5of7">
												<?php the_excerpt(); ?>
											</div>
										</div>


							<?php endwhile; else : ?>
						<?php endif; ?>	
					</div>
</article>
						
						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
