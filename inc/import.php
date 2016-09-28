<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../../../wp-blog-header.php";
if (isset($_POST['act']) && $_POST['act']=="list"){
	$dir = new DirectoryIterator("/home/baliadv/public_html/articles/".$_POST['cat']."/2014/");
	$list=array();
	foreach ($dir as $fileinfo) 
	if (!$fileinfo->isDot()){
		$mtime=intval($fileinfo->getMTime());
		//echo mktime(0,0,0,1,1,2015)." < ".$mtime." > ".mktime(0,0,0,1,11,2014)."\n";
		if( ($mtime < mktime(0,0,0,1,1,2015)) && ($mtime > mktime(0,0,0,11,1,2014)))
		$list[]="/home/baliadv/public_html/articles/".$_POST['cat']."/2014/".$fileinfo->getFilename();
	}
	echo json_encode($list);
} else if (isset($_POST['act']) && $_POST['act']=="post"){
	$content=file_get_contents($_POST['url']);
	$content=substr($content,strpos($content,'<!-- InstanceBeginEditable name="content" -->')+45);
	$content=substr($content,0,strpos($content,'<!-- InstanceEndEditable -->'));
	//$content="content";
	$ftime=date("Y-m-d H:i:s", filemtime($_POST['url']));
	$cat=array(
		"altvoice"=>66,
		"bali_explorer"=>45,
		"bali_kids"=>33,
		"balipc"=>59,
		"beauty_discovery"=>65,
		"beauty_health"=>68,
		"dvd_diary"=>24,
		"feature"=>19,
		"fixed_abode"=>67,
		"food_glorious"=>50,
		"frugal"=>29,
		"garden_doctor"=>49,
		"greenspeak"=>64,
		"hector"=>72,
		"horoscope"=>48,
		"kulturekid"=>61,
		"money_matters"=>17,
		"music_matters"=>23,
		"news"=>14,
		"numdeplum"=>56,
		"paradise"=>75,
		"pathways"=>55,
		"retail"=>39,
		"sanur_scoop"=>97,
		"siapa"=>53,
		"social_media"=>30,
		"sporting"=>81,
		"tokobuku"=>31,
		"ubudnews"=>78,
		"ubudwriters"=>60
	);
	$_excs=strpos($content,'content="');
	if ($_excs>-1){
		$_excs+=+9;
		$_exce=strpos($content,'">');
		$excerpt=substr($content,$_excs,$_exce-$_excs);
		$excerpt = str_replace("&rsquo;","'", $excerpt); 
		$excerpt=trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($excerpt))))));
		
		$_tits=$_exce+2;
		$_tite=strpos($content,'</h1>');
		$title=substr($content,$_tits,$_tite-$_tits);
		$title = str_replace("&rsquo;","'", $title); 
		$title = str_replace("&lsquo;","'", $title); 
		$title=trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($title))))));
	} else {
		$excerpt=trim(substr(strip_tags($content),0,1000));
		$excerpt = str_replace("&rsquo;","'", $excerpt); 
		$excerpt = str_replace("&lsquo;","'", $excerpt); 
		$excerpt=trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($excerpt))))));
		$_tite=strpos($content,'</h1>');
		$title=trim(strip_tags(substr($content,0,$_tite)));
		$title = str_replace("&rsquo;","'", $title); 
		$title = str_replace("&lsquo;","'", $title); 
		$title=trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($title))))));
	}
	
	$post = array(
	  'post_content'   => $content, // The full text of the post.
	  'post_name'      => str_replace(" ","-",$title), // The name (slug) for your post
	  'post_title'     => $title, // The title of your post.
	  'post_status'    => 'publish', // Default 'draft'.
	  'post_excerpt'   => $excerpt, // For all your post excerpt needs.
	  'post_date'      => $ftime, // The time post was made.
	  'post_category'  => array($cat[$_POST['cat']]),
	  'tags_input'     => '2014'
	);
	wp_insert_post( $post );
	$post['post_content']='content';
	print_r($post);
} else echo getcwd();
?>