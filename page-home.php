<?php
/*
Template Name: Home page template
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">


	<div class="main_cont">
		<div class="help_you">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php //the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php //edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php //comments_template(); ?>
			<?php endwhile; ?>
		</div>
	</div>
	
	<div class="container print_vers wow fadeInUp">
	<div class="row center">
	<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1"><h4>Read the print version of Bali Advertiser online</h4>
	
	<div class="container-fluid">
	<?php echo do_shortcode( '[ISSUU2]' ); ?>
	<?php //include '/mags/index.php'; ?>
	</div>
			</div>
	</div>
			</div>		

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
