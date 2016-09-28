<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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

<div class="container cont_part wow fadeInLeft">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<!-- =============== -->
			<div class="container srch_archv">

			  <div class="row">
					<div class="col-xs-12 col-lg-6">
					<h3>Current Columns</h3>
			   <?php
			     $categories = get_categories("orderby=name&child_of=111");
				 foreach($categories as $category){
				    $cat_id = $category->term_id;
			   ?>
					<h4><a href="<?php bloginfo( 'url' ); ?>/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></h4>

					<!-- disabled year category -->
					<!-- <div class="col-xs-12 col-sm-12 col-md-10 catg_d_link">
						<div class="row">
						    <?php
							  /* $archh = array();
                              $args = array( 'posts_per_page' => -1, 'category' => $cat_id );
                              $myposts = get_posts( $args );
                              foreach($myposts as $postt){
							     $total_date = $postt->post_date;
								 $total_da = explode('-',$total_date);
								 $year = $total_da[0];
								 array_push($archh,$year);
							  }
							  $ready_year = array_unique($archh);
							  foreach($ready_year as $year){ */
							?>
							<div class="col-xs-2 col-sm-2 col-md-2"><a href="<?php /* echo get_term_link( $category ); */ ?>?archive=<?php /* echo $year; */ ?>"><?php /* echo $year; */ ?></a></div>
							<?php
							   /* } */
							?>
						</div>

					</div> -->
				<?php
				  }
				?>
				</div>
					<div class="col-xs-12 col-lg-6">
			  <h3>Discontinued Columns</h3>
				 <?php
			     $categories = get_categories("orderby=name&child_of=112");
				 foreach($categories as $category){
				    $cat_id = $category->term_id;
			   ?>
					<h4><a href="<?php bloginfo( 'url' ); ?>/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></h4>

					<!-- disabled year category -->
					<!-- <div class="col-xs-12 col-sm-12 col-md-10 catg_d_link">
						<div class="row">
						    <?php
							  /* $archh = array();
                              $args = array( 'posts_per_page' => -1, 'category' => $cat_id );
                              $myposts = get_posts( $args );
                              foreach($myposts as $postt){
							     $total_date = $postt->post_date;
								 $total_da = explode('-',$total_date);
								 $year = $total_da[0];
								 array_push($archh,$year);
							  }
							  $ready_year = array_unique($archh);
							  foreach($ready_year as $year){ */
							?>
							<div class="col-xs-2 col-sm-2 col-md-2"><a href="<?php /* echo get_term_link( $category ); */ ?>?archive=<?php /* echo $year; */ ?>"><?php /* echo $year; */ ?></a></div>
							<?php
							   /* } */
							?>
						</div>

					</div> -->
				<?php
				  }
				?>
			    </div>
			  </div>

				<div class="bottom_common_link">
					<ul>
						<li class="return"><a href="#top">return to top</a></li>
						<!--<li><?php //if(function_exists('email_link')) { email_link(); } ?></li>-->

					</ul>
				</div>
			</div>

		<!-- ================ -->
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php //get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php //twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

			</div>

			<!--<div class="col-xs-12 col-sm-2 col-md-2 add_sidebar">
				<?php //get_sidebar(); ?>
			</div> -->
			</div>
		</div>



<?php //get_sidebar('main'); ?>
<?php get_footer(); ?>
