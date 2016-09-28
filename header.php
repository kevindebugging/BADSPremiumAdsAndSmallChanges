<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<!-- =========== -->
	<!-- Bootstrap -->
  	<!--<link href="<?php //bloginfo( 'template_url' ); ?>/css/bootstrap.css" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
  <!--<link rel="stylesheet" type="text/css" href="<?php // echo get_template_directory_uri(); ?>/css/animate.css" media="screen">-->
	<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>-->

<script>
  new WOW().init();

 //paste this code under head tag or in a seperate js file.
	// Wait for window load
  $(window).load(function() {
		// Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
  });
</script>

<!-- tracking code -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
_uacct = "UA-357438-1";
urchinTracker();
// -->
</script>


<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>

		<!-- <div class="se-pre-con"></div> -->

		<div class="top_nav navbar-fixed-top">
		<div class="container">
	  <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
			<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#second">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Click Here</a>
          </div>
			<div class="navbar-collapse collapse" id="second">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ) ); ?>

	  </div>
	  </div></div>
	</div>
	</div>
		<div class="main_logo_sec">
			<div class="container logo_inn wow fadeInDown">
			  <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>//images/logo.png" alt="" border="0"></a>
			  </div>
			</div>
			<div class="header_txt wow fadeInLeft">
		<div class="container">
		<div class="row">
			<div class="co-xs-12 col-sm-12 co-md-12">
			<h1><?php the_field('title_section',2);?></h1>
			</div>
			</div>
		</div>
	</div>
	<?php if(!is_front_page() ) : ?>
  		<div class="container the-breadcrumbs wow fadeInLeft" xmlns:v="http://rdf.data-vocabulary.org/#">
    	<?php if(function_exists('bcn_display'))
    		{
					$home_url = get_home_url();
					$home_breadcrumb = "<span typeof='v:Breadcrumb'>
						<a rel='v:url' property='v:title' title='Go to Home Page.'
						href='" . $home_url . "' class='home'>Home</a></span> &gt; ";
					$placead_breadcrumb = $home_breadcrumb . "<span typeof='v:Breadcrumb'>
						<a rel='v:url' property='v:title' title='Go to Place an Ad.'
						href='" . $home_url . "/place-an-ad/' class='post post-page'>Place an Ad</a></span> &gt; ";

						if ($_GET['q'] == 'subscribe') {
								$home_breadcrumb .=	"<span typeof='v:Breadcrumb'><span property='v:title'>Subscribe</span></span>";
								echo $home_breadcrumb;

						}elseif ($_GET['q'] == 'contact-map' ) {
								$home_breadcrumb .=	"<span typeof='v:Breadcrumb'><span property='v:title'>Contact</span></span>";
								echo $home_breadcrumb;

						}elseif ($_GET['q'] == 'display' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Display Ads</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'real-estate' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Real Estate</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'real-estate-looking' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Looking For Real Estate</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'employees' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Employees Wanted</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'employment' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Employment Wanted</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'business-services' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Business Services</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'hello' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Hello Ads</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'cars' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Cars, Motorcycle, Watercraft, etc</span></span>";
							echo $placead_breadcrumb;

					  }elseif ($_GET['q'] == 'pets' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Pet Parade</span></span>";
							echo $placead_breadcrumb;

						}elseif ($_GET['q'] == 'private' ) {
							$placead_breadcrumb .= "<span typeof='v:Breadcrumb'><span property='v:title'>Private Classified</span></span>";
							echo $placead_breadcrumb;

						}else{
							bcn_display();
						}

    	}?>
		</div>
	<?php endif; ?>
