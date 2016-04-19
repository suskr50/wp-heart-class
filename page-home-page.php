<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">



			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<header class="article-header">




					</header> <?php // end article header ?>

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

									<?php get_sidebar('sidebar2'); ?>	
								</article>

								<aside class="entry-content cf">



									<div class="m-all t-all d-5of7 cf">
										<section class="announcments">	<hr>
											<h1> Announcements </h1>

											<?php query_posts('posts_per_page=3')?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

												<div class="announce-wrap cf">

													<div class="announce-picture ">
														<?php the_post_thumbnail();?>
													</div>

													<div class="announce-article">

													<div class="announce-title">
														<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
													</div>	

													<div class="announce-text">
														<?php the_excerpt(); ?>
													</div>
													</div>
													
												</div>
												


											<?php endwhile; else : ?>
										<?php endif; ?>	
									</section>

								</div>

								<?php get_sidebar(); ?>	

								<aside>

						</main>


				</div>

			</div>

<?php get_footer(); ?>
