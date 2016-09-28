$(document).ready(function(){
		
		 $(".select_area_drop select").css("opacity",0);
		 var option_txt;
		 
		 $(".select_area_drop .select_area").html($('.select_area_drop select option').eq(0).text());
		 
		$('.select_area_drop select').change( function(){
			option_txt = $(this).find("option:selected").text();
			
			//alert(option_txt);
			
			var toshow = $(this).val();
			var topz = $(toshow).offset().top;
			
			var body = $("html, body");
			body.animate({scrollTop:topz-$(".top_nav").height()}, '500', 'swing', function() { 
			 
			});
			//$(this).parent().find(".select_area").html(option_txt);
			
		
		});
		
		//var return_txt = $(".bottom_common_link ul li").eq(1).text();
		//var returntop = $(return_txt).offset().top;
		//alert(returntop);
		
		$(window).scroll(function(){
			
				if ($(this).scrollTop() > 800) {
					$('.return').fadeIn();
				} else {
					$('.return').fadeOut();
				}
			}); 
			
			//===================== Blog
			
			
		 /*$(".select_area_drop_1 select").css("opacity",0);
		 var option_txt_1;
		 
$(".select_area_drop_1 .select_area").html($('.select_area_drop_1 select option').eq(0).text());
		 
		$('.select_area_drop_1 select').change( function(){
			option_txt_1 = $(this).find("option:selected").text();
			//$(this).val();
			//$(this).find("option:selected").text();
			$(".select_area_drop_1 .select_area").html(option_txt_1);
			});*/
			
		 
		 //=====
		  /*var len = $(".select_area_drop_2").lenght;
		  alert(len);*/
		  var len = $(".select_area_drop_2").length;
		  
		  $(".select_area_drop_2 select").css("opacity",0);
		  var option_txt_2;
		 
		 /* $(".select_area_drop_2 .select_area").html($('.select_area_drop_2 select option').eq(0).text());
		 
		  $('.select_area_drop_2 select').change( function(){
			option_txt_2 = $(this).find("option:selected").text();
			$(".select_area_drop_2 .select_area").html(option_txt_2);
		  });*/
		  
		/* ========================== */

			

//smooth animation			
$('a[href^="#"]').click(function() {

$('html,body').animate({ scrollTop: $(this.hash).offset().top}, 800);

return false;

e.preventDefault();

});
			
			
		//$(".dropdown img.flag").addClass("flagvisibility");

  $(".dropdown dt a").click(function() {
    $(".dropdown dd ul").toggle();
  });

  $(".dropdown dd ul li a").click(function() {
    var text = $(this).html();
    var did = $(this).attr('href');
    $(".postform").val(did);
    $(".dropdown dd ul").hide();
    $(".dropdown dt a span").html(text);
  }); 
 
  /*
  function getSelectedValue(id) {
    return $("#" + id).find("dt a span.value").html();
  } */

  $(document).bind('click', function(e) {
    var $clicked = $(e.target);
    if (!$clicked.parents().hasClass("dropdown"))
      $(".dropdown dd ul").hide();
  });
	
	$(".wow").ready(function(){
		$(".wow").css("opacity", "1");
	});
	
	
});
