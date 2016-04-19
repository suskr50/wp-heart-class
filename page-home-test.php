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

					

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

								<?php the_content(); ?>

								</header>

								<section class="entry-content cf" itemprop="articleBody">

									<section class="announcments">	<hr>
										<h1> Announcements </h1>
										<?php query_posts('posts_per_page=3')?>
										<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

											<div class="announce-title">
												<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
											</div>		
											<div class="announce-picture">
												<?php the_post_thumbnail();?>
											</div>
											
											<div class="announce-text">
												<?php the_excerpt(); ?>
											</div>
										
							
									<?php endwhile; else : ?>
<?php endif; ?>	
									</section>

								</section>





					

						</main>

			<?php get_sidebar(); ?>
			

				</div>

			</div>


<?php get_footer(); ?>
