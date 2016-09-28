<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<span class="anchor" id="top" name="top"></span>
	<div id="primary" class="content-area wow fadeInUp">
		<div id="content" class="site-content" role="main">
		<!-- ==================== -->
		<div class="container cont_part">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-10">
			<?php /* The loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', get_post_format() ); ?>
							<?php twentythirteen_post_nav(); ?>
							<?php comments_template(); ?>

						<?php endwhile; ?>
						<div class="bottom_common_link">
							<ul>
								<li class="return"><a href="#top">return to top</a></li>
								<li>
									<?php if (!is_page('ads-form')){
													if(function_exists('email_link')) { email_link(); }
												} ?>
								</li>

							</ul>
						</div>
			</div>



			<div class="col-xs-12 col-sm-2 col-md-2 add_sidebar">
				<?php get_sidebar(); ?>
			</div>
			</div>
		</div>

		<!-- ==================== -->


		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
