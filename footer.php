<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>


		<div class="footer1">
	
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-8">
			<?php the_field('common_footer_editor',2);?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 site_map">
				<h4>Explore</h4>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
			</div>
			</div>
	</div>
<div class="footer2">
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12">
			Copyright &copy; <?php echo date('Y'); ?> <a href="//baliadvertiser.biz/">Bali Advertiser</a>. All Rights Reserved.

<?php if(is_front_page()) {
	$htmlstr = '<br>Bali SEO & Website Design by <a href="http://www.islandmediamanagement.com" title="Island Media Management" target="_blank">Island Media Management</a>'; 
	echo $htmlstr;
	}
?>
		
		</div>
	</div>
</div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/custom.js"></script>
	
	<script type="text/javascript">
	   $(document).ready(function(){
	      var len = $(".select_area_drop_2").length;
		  var eqr = len-1;
		  
$("select> option:first-child", $(".select_area_drop_2").eq(0)).text("Browse by Issue");
$("select> option:first-child", $(".select_area_drop_2").eq(1)).text("Browse by Category");
		  
		  for(var i=0; i<=eqr; i++){
		     var ele = $(".select_area_drop_2").eq(i);
             var textt = $("select > option:first-child", ele).text();
			 $(".select_area", ele).text(textt);
			 
			 $('select', ele).change( function(){
			     //alert($(this).html());
			     $(".select_area", $(this).parent()).text($(this).find("option:selected").text());
		     });
			 
			 
		  }
		  
		  
		  //alert(len);
                    		  
	   });
	</script>
	<?php wp_footer(); ?>
	
</body>
</html>