<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<a name="top" id="top"></a><div id="primary" class="content-area wow fadeIn">
		<div id="content" class="site-content" role="main">
		<?php if (is_page('place-an-ad')){ ?>
			<span class="anchor" id="top" name="top"></span>
			<div class="dropdown_with_link wow fadeInUp">
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<?php //wp_nav_menu( array( 'theme_location' => 'forth_menu') ); ?>
					<div class="select_area_drop">
						<!-- <div class="select_area">Content for  class "select_area"</div> -->
				<?php
			$args = array(
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'post_type'              => 'nav_menu_item',
			'post_status'            => 'publish',
			'output'                 => ARRAY_A,
			'output_key'             => 'menu_order',
			'nopaging'               => true,
			'update_post_term_cache' => false );

			$items = wp_get_nav_menu_items( 5, $args );
			/* echo '<select id="manin_nav" name="manin_nav" value="GO" onchange="location = this.options[this.selectedIndex].value;">';
			echo '<option value="#select_navigation"> Select an Ad Type </option>';
			foreach($items as $val){
				if(($val->menu_item_parent) > 0)
				echo '<option value="'.$val->url.'">&nbsp;&nbsp;&nbsp;&nbsp;>'.$val->title.'</option>';
				else
				echo '<option value="'.$val->url.'">'.$val->title.'</option>';
			}
			echo '</select>';
    			*/ ?>

<dl id="sample" class="dropdown">
  <dt><a><span>Select an Ad Type</span></a></dt>
  <dd>
    <ul>
      	<?php foreach($items as $val){
		if(($val->menu_item_parent) > 0)
		echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;><a href="'.$val->url.'">'.$val->title.'</a></li>';
		else
		echo '<li><a href="'.$val->url.'">'.$val->title.'</a></li>';
		}
	?>
    </ul>
  </dd>
</dl>

					</div>
				<?php wp_nav_menu( array( 'theme_location' => 'third_menu') ); ?>
				</div>
			</div>

			</div>
		</div>
		<?php } else

		if (is_page('real-estate-ads')){ ?>
			<span class="anchor" id="top" name="top"></span>
			<div class="dropdown_with_link wow fadeInUp">
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<?php //wp_nav_menu( array( 'theme_location' => 'fifth_menu') ); ?>

					<div class="select_area_drop">
						<!-- <div class="select_area">Content for  class "select_area"</div> -->
				<?php
			$args = array(
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'post_type'              => 'nav_menu_item',
			'post_status'            => 'publish',
			'output'                 => ARRAY_A,
			'output_key'             => 'menu_order',
			'nopaging'               => true,
			'update_post_term_cache' => false );

			$items = wp_get_nav_menu_items( 100, $args );

			/* echo '<select id="manin_nav" name="manin_nav" value="GO" onchange="location = this.options[this.selectedIndex].value;">';
			echo '<option value="#select_navigation"> Select an Area </option>';
			foreach($items as $val){
				if(($val->menu_item_parent) > 0)
				echo '<option value="'.$val->url.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$val->title.'</option>';
				else
				echo '<option value="'.$val->url.'">'.$val->title.'</option>';
			}
			echo '</select>'; */
    			?>

<dl id="sample" class="dropdown">
  <dt><a><span>Select an Area</span></a></dt>
  <dd>
    <ul>
      	<?php foreach($items as $val){
		if(($val->menu_item_parent) > 0)
		echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;><a href="'.$val->url.'">'.$val->title.'</a></li>';
		else
		echo '<li><a href="'.$val->url.'">'.$val->title.'</a></li>';
		}
	?>
    </ul>
  </dd>
</dl>

					</div>
				</div>
			</div>

			</div>
		</div>
		<?php } else if (is_page('employment-ads')){ ?>
			<span class="anchor" id="top" name="top"></span>
			<div class="dropdown_with_link wow fadeInUp">
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<?php //wp_nav_menu( array( 'theme_location' => 'sixth_menu') ); ?>

					<div class="select_area_drop">
						<!-- <div class="select_area">Content for  class "select_area"</div> -->
				<?php
			$args = array(
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'post_type'              => 'nav_menu_item',
			'post_status'            => 'publish',
			'output'                 => ARRAY_A,
			'output_key'             => 'menu_order',
			'nopaging'               => true,
			'update_post_term_cache' => false );

			$items = wp_get_nav_menu_items( 101, $args );

			/* echo '<select id="manin_nav" name="manin_nav" value="GO" onchange="location = this.options[this.selectedIndex].value;">';
			echo '<option value="#select_navigation"> Select a Category </option>';
			foreach($items as $val){
				if(($val->menu_item_parent) > 0)
				echo '<option value="'.$val->url.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$val->title.'</option>';
				else
				echo '<option value="'.$val->url.'">'.$val->title.'</option>';
			}
			echo '</select>'; */
    			?>

<dl id="sample" class="dropdown">
  <dt><a><span>Select a Category</span></a></dt>
  <dd>
    <ul>
      	<?php foreach($items as $val){
		if(($val->menu_item_parent) > 0)
		echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;><a href="'.$val->url.'">'.$val->title.'</a></li>';
		else
		echo '<li><a href="'.$val->url.'">'.$val->title.'</a></li>';
		}
	?>
    </ul>
  </dd>
</dl>

					</div>
				</div>
			</div>

			</div>
		</div>
		<?php } else if (is_page('private-classified-ads')){ ?>
			<!--<span class="anchor" id="top" name="top"></span>
			<div class="dropdown_with_link wow fadeInUp">
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<?php //wp_nav_menu( array( 'theme_location' => 'seventh_menu') ); ?>

					<div class="select_area_drop">-->
						<!-- <div class="select_area">Content for  class "select_area"</div> -->
				<?php
			$args = array(
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'post_type'              => 'nav_menu_item',
			'post_status'            => 'publish',
			'output'                 => ARRAY_A,
			'output_key'             => 'menu_order',
			'nopaging'               => true,
			'update_post_term_cache' => false );

			$items = wp_get_nav_menu_items( 102, $args );

			/* echo '<select id="manin_nav" name="manin_nav" value="GO" onchange="location = this.options[this.selectedIndex].value;">';
			echo '<option value="#select_navigation"> Select a Category </option>';
			foreach($items as $val){
				if(($val->menu_item_parent) > 0)
				echo '<option value="'.$val->url.'">&nbsp;&nbsp;&nbsp;&nbsp;'.$val->title.'</option>';
				else
				echo '<option value="'.$val->url.'">'.$val->title.'</option>';
			}
			echo '</select>'; */
    			?>

<!--<dl id="sample" class="dropdown">
  <dt><a><span>Select a Category</span></a></dt>
  <dd>
    <ul>
      	<?php foreach($items as $val){
		if(($val->menu_item_parent) > 0)
		echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;><a href="'.$val->url.'">'.$val->title.'</a></li>';
		else
		echo '<li><a href="'.$val->url.'">'.$val->title.'</a></li>';
		}
	?>
    </ul>
  </dd>
</dl>

					</div>
				</div>
			</div>

			</div>
		</div>-->
<div class="container search-on-page-div">
	<input type="text" id="searchfor"/><button class="search-on-page" id="search-on-page">Search</button>
	<input type="hidden" id="previous-text"/>
	<input type="hidden" id="currentIdx"/>
	<input type="hidden" id="total-found"/>
	<p id ="nothing-found">Sorry, we can't find what you search.</p>
	<p id ="found-info"></p>
</div>
		<?php } else { ?>

		<?php } ?>



		<div class="container cont_part">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-10">
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
						<?php 							if (is_page('ads-form')) include get_template_directory()."/chilly.php";							else the_content();						?>
			  </div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php //edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php //comments_template(); ?>
				<div class="bottom_common_link">
					<ul>
						<li class="return"><a href="#top">return to top</a></li>
						<!--<li>
							<?php if (!is_page('ads-form')){
											//if(function_exists('email_link')) { email_link(); }
										} ?>
						</li>-->

					</ul>
				</div>
			<?php endwhile; ?>
			</div>

			<div class="col-xs-12 col-sm-2 col-md-2 add_sidebar">
				<?php get_sidebar(); ?>
			</div>
			</div>
		</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
