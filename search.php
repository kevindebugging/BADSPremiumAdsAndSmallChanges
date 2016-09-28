<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="dropdown_with_link wow fadeInUp">
	<div class="container">

			<div class="col-xs-12 col-md-12">
				<?php echo do_shortcode( '[searchandfilter taxonomies="search,name,category"]' ); ?>
			</div>
			<span class="anchor" id="top" name="top"></span>

		</div>
	</div>

	<div id="primary" class="content-area wow fadeInUp">
		<div id="content" class="site-content" role="main">
		<!-- ================= -->
		<div class="container cont_part">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-10">
<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>
			</header>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
			</div>

			<div class="col-xs-12 col-sm-2 col-md-2 add_sidebar">
				<?php get_sidebar(); ?>
			</div>
			</div>
		</div>

		<!-- ================= -->


		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
