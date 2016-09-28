<?php

  ini_set('display_errors',1);

  ini_set('display_startup_errors',1);

  error_reporting(-1);



function parsestr($x){

  $info=explode("&",$x);

  foreach ($info as $infoitem){

    $tmp=explode("=",$infoitem);

    $data[$tmp[0]]=$tmp[1];

  }

  return $data;

}

/** Confirmation section **/

if (isset($_POST['ad_info'])){

  $data=parsestr($_POST['ad_info']);

  $data=array_merge(array(

    "company"=>"",

    "email"=>"",

    "subject"=>"",

    "city"=>"",

    "state"=>"",

    "country"=>"",

    "postcode"=>"",

    "price_word"=>"",

    "price_issue"=>"",

    "issues"=>"",

    "payment"=>"",

    "location"=>""

  ),$data);

  $methcash = "If paying in cash you need to do this in person at the Bali Advertiser office at Jl. Majapahit #46 Kuta, Bali or you can call +62-361-755392 for more details.\n";



  $methbank = "Please see bank account details below. You will need to fax or email a copy of the transfer to Bali Advertiser.\n\nBank Account Details:\n\nBank Central Asia (BCA) - Cokroaminoto Branch - Jl. Cokroaminoto No. 32 E, Denpasar\nBank Code: CENAIDJA\nAccount Name: PT. Citra Bali Pariwara\nAccount #: 4350114799\n\nOr\n\nBank Rakyat Indonesia (BRI) - Kuta Branch- Jl. Dewi Sri 99X, Kuta\nBank Code: BRINIDJA\nAccount Name: PT. Citra Bali Pariwara\nAccount #: 0556 01 000628 308\n\nFor International Transfers The Sender Must Pay All Charges So That Bali Advertiser Receives The Payment Due In Full.\n\n";



  $methpaypal = "Our staff will email you shortly with the payment due and our PayPal account information. Please note we only accept US Dollar payments at PayPal. The payment due includes a surcharge of 5% for PayPal related charges.\nIf you do not receive an email from Bali Advertiser with the payment due and our account information with in several days, please email direct to Bali Advertiser at info@baliadvertiser.biz\n";



  $adclosep = "Your ad will be placed once payment has been received.\n\n";

  $closetag = "Bali Advertiser - Advertising For The Expatriate Community\n";



  switch ($_POST['adtype']){

    case "Private Classified":

      //$c_msg=file_get_contents(dirname(__FILE__)."/inc/mail_client_private.txt");

      $c_msg="Thank You From Bali Advertiser\n\nDear {name},\nThank you for placing the following ad in Bali Advertiser.\nAd Type\t: ".$_POST['adtype']."\nFrom\t: {name}\nPhone\t: {phone}\nEmail\t: {email}\n{location}\n\nAd Content:\n{adtextareacontent}\nYour ad will appear in the next edition of Bali Advertiser.\n\nPlease note that items for sale without a location specified will not be published.\n";

      //$s_msg=file_get_contents(dirname(__FILE__)."/inc/mail_server_private.txt");

      $s_msg="Private Classified Ad Submission\n\nFrom\t: {name}\nPhone\t: {phone}\nEmail\t: {email}\n{location}\nAd Content:\n{adtextareacontent}\n";

      $c_subj="Thank You From Bali Advertiser";

      $s_subj="Private Classified Ad Submission";

    break;

    case "Subscription":

    $c_msg="

    Thank You From Bali Advertiser\n\nDear {name},\nThank you for subscribing to Bali Advertiser.\n\nFrom\t: {name}\nAddress\t: {address}\nCity\t: {city}\nState\t: {state}\nPostcode\t: {postcode}\nCountry\t: {country}\nEmail\t: {email}\nPhone\t: {phone}\nFax\t: {fax}\nCompany\t: {company}\nPayment Method\t: {payment}\nComments:\n{subscribecomments}\n\nYou have chosen to pay for your subscription by {payment}.";

    //$s_msg=file_get_contents(dirname(__FILE__)."/inc/mail_server.txt");

    $s_msg="".$_POST['adtype']." Section\n\nFrom\t: {name}\nAddress\t: {address}\nCity\t: {city}\nState\t: {state}\nPostcode\t: {postcode}\nCountry\t: {country}\nEmail\t: {email}\nPhone\t: {phone}\nFax\t: {fax}\nCompany\t: {company}\nPayment Method\t: {payment}\n\nComments:\n{subscribecomments}\n";

    $c_subj="Thank You From Bali Advertiser";

    $s_subj=$_POST['adtype']." Form";

    break;

    case "Contact Us": //contact us

    case "Display Ads":

      //$c_msg=file_get_contents(dirname(__FILE__)."/inc/mail_client.txt");

      $c_msg="Thank You From Bali Advertiser\n\nDear {name},\nThank you for sending the following messsage to Bali Advertiser.\n\nFrom\t: {name}\nCompany\t: {company}\nAddress\t: {state}\n\t  {country}\n\t  {postcode}\nPhone\t: {phone}\nEmail\t: {email}\nSubject\t: {subject}\n\nComments:\n{comments}\n";

      //$s_msg=file_get_contents(dirname(__FILE__)."/inc/mail_server.txt");

      $s_msg="".$_POST['adtype']." Section\n\nFrom\t: {name}\nCompany\t: {company}\nAddress\t: {state}\n\t  {country}\n\t  {postcode}\nPhone\t: {phone}\nEmail\t: {email}\nSubject\t: {subject}\n\nComments:\n{comments}\n\n";

      $c_subj="Thank You From Bali Advertiser";

      $s_subj=$_POST['adtype']." Form - " . str_replace("+", " ", $data['subject']);

    break;

    default: //standard ads format

      //$c_msg=file_get_contents(dirname(__FILE__)."/inc/mail_client_ads.txt");

      $min30words = "";

      if ($_POST['adtype'] == "Real Estate") {

        $min30words = "( Minimum 30 Words )";

        if($data['wc'] < 30){

          $data['price_issue'] = "390,000";

        }

      }



      $c_msg="Thank You From Bali Advertiser\n\nDear {name},\nThank you for placing the following ad in Bali Advertiser.\n\nAd Type\t: ".$_POST['adtype']."\nFrom\t: {name}\nPhone\t: {phone}\nEmail\t: {email}\n{location}\n\nAd Content: \n{adtextareacontent}\n\nNumber Of Words\t: {wc}\nPrice Per Word\t: Rp {price_word} ".$min30words."\nPrice Per Issue\t: Rp {price_issue}\nNo. Of Issues\t: {issues}\nPayment Due\t: Rp {total}\nPayment Method\t: {payment}\n\nYou have chosen to pay for your ad by {payment}, please note that no ads will be printed before payment is made.\n";

      //$s_msg=file_get_contents(dirname(__FILE__)."/inc/mail_server_ads.txt");

      $s_msg="".$_POST['adtype']." Section\n\nFrom\t: {name}\nPhone\t: {phone}\nEmail\t: {email}\n{location}\nAd Content:\n{adtextareacontent}\n\nNumber Of Words\t: {wc}\nPrice Per Word\t: Rp {price_word} ".$min30words."\nPrice Per Issue\t: Rp {price_issue}\nNo. Of Issues\t: {issues}\nPayment Due\t: Rp {total}\nPayment Method\t: {payment}\n";

      $c_subj="Thank You From Bali Advertiser";

      $s_subj="Ad for ".$_POST['adtype']." Section";

    break;

  }



  if ($data['payment'] == 'Cash') {

    $c_msg .= $methcash;

  }elseif ($data['payment'] == 'Bank+Transfer') {

    $c_msg .= $methbank;

  }elseif ($data['payment'] == 'Pay+Pal') {

    $c_msg .= $methpaypal;

  }



  switch ($_POST['adtype']) {

    case "Subscription" :

    case "Contact Us":

    case "Display Ads":

    case "Private Classified":

      $c_msg .= $closetag;

      break;

    default:

      $c_msg .= $adclosep;

      $c_msg .= $closetag;

}



  foreach ($data as $key=>$value){

    if ($key=="email") { $email=urldecode($value);} //$value="E-Mail : \n".$value; }

    else if ($key=="payment") {$pmethod=$value;}

    else if ($key=="location") {

      if($value!=""){

        if ($_POST['adtype'] == "Private Classified") {

          $value="Item Location : ".$value."\n";

        }else{

          $value="Property Location : ".$value."\n";

        }

      }

      else {$value="";}

    }

    $c_msg=str_replace("{".$key."}",urldecode($value),$c_msg);

    $s_msg=str_replace("{".$key."}",urldecode($value),$s_msg);

  }

  /*echo "Client Subject : ".$c_subj."<br>";

  echo "Client MSG : ".$c_msg."<hr>";

  echo "BA Subject : ".$s_subj."<br>";

  echo "BA MSG : ".$s_msg."<hr>";*/



  $ok=true;

  //send to BA

  $msg = wordwrap($s_msg,70);

  $sheaders = "MIME-Version: 1.0" . "\r\n";

  $sheaders .= "Content-Type: text/plain; charset=utf-8\r\n";

  $sheaders .= 'From: '.$email."\r\n";

  //$sheaders .= "Bcc: debugging@islandmediamanagement.com";

  if (!mail('info@baliadvertiser.biz',$s_subj,$msg,$sheaders)) $ok=false;

  //send to client

  $msg = wordwrap($c_msg,70);

  $cheaders = "MIME-Version: 1.0" . "\r\n";

  $cheaders .= "Content-Type: text/plain; charset=utf-8\r\n";

  $cheaders .= 'From: Baliadvertiser <info@baliadvertiser.biz>' . "\r\n";



  if (!mail($email,$c_subj,$msg,$cheaders))$ok=false;

  if ($ok) {

    if($_POST['adtype']=="Subscription"){ ?>

      <h3>Subscription Sent</h3>

      <p>Thank You for subscribing to Bali Advertiser, your message has been received by our server and a confirmation message has been sent to your e-mail address.</p>

      <p>Your Subscription will commence once payment has been received. Payment can be made in cash, by bank transfer or PayPal.</p>

      <p>If paying by bank transfer please see bank account details below.</p>

      <p>If paying by PayPal, our staff will email you shortly with the payment due and our PayPal account information. Please note we only accept US Dollar payments at PayPal.

      The payment due will include a surcharge of 5% for PayPal related charges. If you do not receive an email from Bali Advertiser with the payment due and our account information with in several days, please email direct to Bali Advertiser at info@baliadvertiser.biz</p>



      <p>If paying in cash you need to do this in person at the Bali Advertiser office at Jl. Majapahit #46 Kuta, Bali or you can call +62-361-755392 for more details.</p>

      <p><strong>Bank Account Details</strong>:<br>

        <br />
        Bank Central Asia (BCA) – (Cokroaminoto) - Jl. Cokroaminoto No. 32 E, Denpasar || Bank Code: CENAIDJA || Account Name: PT. Citra Bali Pariwara || Account#: 4350114799<br />
        <br />
        or <br />
        <br />
        Bank Rakyat Indonesia (BRI) – Kuta Branch – Jl. Dewi Sri 99X, Kuta || Bank Code: BRINIDJA || Account Name: PT Citra Bali Pariwara || Account# : 0556 01 000628 308 <br />
        <br />
        For International Transfers The Sender Must Pay All Charges So That Bali Advertiser Receives The Payment Due In Full.<br>

        <?php }

    else if($pmethod=="Cash"){ ?>
      </p>
<h3>All done</h3>

      <p>We have successfully received your ad.<br>

      Thank you for placing your ad with Bali Advertiser.</p>

      <p>You have chosen <?php echo str_replace("+", " ", $pmethod); ?> payment method.</br>

      <p>If paying in cash you need to do this in person at the Bali Advertiser office at Jl. Majapahit #46 Kuta, Bali or you can call +62-361-755392 for more details.</p>



    <?php }

    else if (str_replace("+", " ", $pmethod)=="Bank Transfer"){ ?>

      <h3>All done</h3>

      <p>We have successfully received your ad.<br>

      Thank you for placing your ad with Bali Advertiser.</p>

      <p>You have chosen <?php echo str_replace("+", " ", $pmethod); ?> payment method.</br>

      If paying by bank transfer you will need to fax a copy of the transfer to Bali Advertiser. Your ad will be published only after payment has been confirmed.<br>

      <strong><br />
      Bank Account Details</strong>:<br>

      <br />
      Bank Central Asia (BCA) – (Cokroaminoto) - Jl. Cokroaminoto No. 32 E, Denpasar ||
        Bank Code: CENAIDJA || Account Name: PT. Citra Bali Pariwara ||
        Account#: 4350114799 <br />
        <br />
        or <br />
        <br />
        Bank Rakyat Indonesia (BRI) – Kuta Branch – Jl. Dewi Sri 99X, Kuta || Bank Code: BRINIDJA || Account Name: PT Citra Bali Pariwara || Account# : 0556 01 000628 308<br />
        <br />
For International Transfers The Sender Must Pay All Charges So That Bali Advertiser Receives The Payment Due In Full.<br>

    <?php }

    else if(str_replace("+", " ", $pmethod)=="Pay Pal"){ ?>

<h3>All Done</h3>

      <p>We have successfully received your ad.<br>

      Thank you for placing your ad with Bali Advertiser</p>

      <p>You have chosen <?php echo str_replace("+", " ", $pmethod); ?> payment method.</br>

      <p>The total due and the PayPal transfer details will be sent to you by email. Please note we only accept US Dollar payments via PayPal. The payment due will include a surcharge of 5% for PayPal related charges.</p>

      <?php }

    else if($_POST['adtype']=="Private Classified"){ ?>

        <h3>All Done</h3>

        <p>Thank you for choosing to advertise with Bali Advertiser.</p>

      <?php }

    else{ ?>

      <h3>All done</h3>

      <p>Thank you for contacting Bali Advertiser, your message has been received by our server and a confirmation message has been sent to your email address.</p>

      <p>We will reply to your message as soon as possible, in the meantime please enjoy your visit to the Bali Advertiser web site.</p>

    <?php }

    ?>

    </p>

  <?php } else { ?>

    <h3>Something's not right</h3>

    <p>We are experiencing a little problem placing your ads.</p>

    <p>Please send your request directly to info@baliadvertiser.biz, or contact us at :</p>

    <p style="text-align:center">

          Street Address :<br>

          Bali Advertiser<br>

          Jl. Majapahit No. 46<br>

          Kuta, Bali<br>

          Indonesia

        </p>

  <?php }



/** Confirmation section **/

} else if (isset($_POST['info'])){

  $ad_info=$_POST['info'];

  $data=parsestr($_POST['info']);

  if ($data['act']=="confirm"){

    /* Removing items from your details area */

    unset($data['act']);

    foreach (array("wc","adtype","form_uri","cost","uri","total","adtextareacontent","comments","subject") as $item){

      if(isset($data[$item])) { $$item=urldecode($data[$item]); unset($data[$item]); }

    }

    $ad_info.="&wc=".$wc."&price_word=".number_format($cost,0)."&price_issue=".number_format(($wc*$cost),0);

  ?>

    <link rel="stylesheet" type="text/css" href="<?php echo $uri; ?>/qaptcha/jquery/QapTcha.jquery.css" media="screen" />

    <script type="text/javascript" src="<?php echo $uri; ?>/qaptcha/jquery/jquery.js"></script>

    <script type="text/javascript" src="<?php echo $uri; ?>/qaptcha/jquery/jquery-ui.js"></script>

    <script type="text/javascript" src="<?php echo $uri; ?>/qaptcha/jquery/jquery.ui.touch.js"></script>

    <script type="text/javascript" src="<?php echo $uri; ?>/qaptcha/jquery/QapTcha.jquery.js"></script>

    <style>

      .important { color:red; position:relative; text-align:left; font-size:0.8em; }

      #tbl_summary td:first-child(){ white-space:nowrap !important;}

    </style>

    <div class="col2 det">

      <h3>Your Details</h3>

      <table width="100%" id="tbl_summary">

      <?php foreach ($data as $key=>$val){

        if ($key=="location") $key="Item Location :";

        else if (in_array($key,array("name"))) $key="Your ".$key." : ";

        else if ($key=="subscribecomments") $key="Comments: ";

        else $key=$key." :";

      ?>

        <tr>

          <td style="text-transform:capitalize"><?php echo $key;?></td>

          <td><?php echo urldecode($val);?></td>

        </tr>

      <?php } ?>

      </table>

      <?php  if(isset($data['subscribecomments'])) { ?>

      <?php } else if (!isset($comments) || $comments==""){ ?>

        <h3>Your Ad Text</h3>

        <?php echo $adtextareacontent;?>

        <div class="important">Please check that you have entered a contact number and/or email address for replies to this ad in your Ad Content above.</div>

        <h3 <?php if($total=="NaN") echo "style='display:none' ";?> >Total Cost : Rp. <?php echo urldecode($total); ?></h3>

      <?php } else { ?>

        <h3>Your Message</h3>

        <p>Subject : <?php echo $subject;?><br>

        Comments : <br><?php echo $comments;?></p>

      <?php } ?>

    </div>

    <div class="col2 ver">

      <p>Please slide the slider below to confirm you are a human user.</p>

      <div class="QapTcha" style="margin:auto"></div>

    </div>

    <script type="text/javascript">

      $(document).ready(function(){

        //alert("doc read 1");



      $('.QapTcha').QapTcha({

        autoSubmit : false,

        autoRevert : true,

        PHPfile : '<?php echo $uri; ?>/qaptcha/php/Qaptcha.jquery.php'

      });

      //alert("doc read 2");

      $("#ad_change").click(function(e){

        $("#adbuttonplace").off();

        $("#ad_preview").fadeOut("slow");

        e.preventDefault();

      });



      function placeAds(){

        $(".TxtStatus").attr("id","TxtStatus");

        if (!$("#TxtStatus").hasClass("dropSuccess")){

          $("#check_slide > #slide_content > #slide_summary > p").html("Please use the slider to confirm you are a human user.");

          $("#check_slide").fadeIn("slow");

          //alert("Please use the slider to confirm you are a human user.\n \nPlease try again.");

        }

        else {

          $("#ad_processing > #proc_content > #proc_summary").html("Placing your ad...");

          $.ajax({

            url:"<?php echo $form_uri;?>",

            data:{ "ad_info":"<?php echo $ad_info;?>","adtype":"<?php echo $adtype;?>"},

            type:"POST",

            success:function(x){

              $("#ad_preview > #adpreviewcontent > #ad_summary").html(x);

              $(".nav_summary").fadeToggle("slow");

            }

          });

        }

      }



      $("#adbuttonplace").on("click", placeAds );



      });

    </script>

  <?php

  }

} else {



/** Form section **/

  $ads=array(

    "contact-us"=>array(

      "label"=>"Contact Us",

      "add"=>"company,subject,city,state,country,postcode",

      "min"=>1,"max"=>-1,

      "cost"=>0

      ),

    "contact-map"=>array(

      "label"=>"Contact Us",

      "add"=>"company,subject,city,state,country,postcode",

      "min"=>1,"max"=>-1,

      "cost"=>0

      ),

    "subscribe"=>array(

      "label"=>"Subscription",

      "add"=>"email,phone,fax,company,payment,subscribecomments",

      "min"=>1,"max"=>-1,

      "cost"=>0

      ),

    "display"=>array(

      "label"=>"Display Ads",

      "add"=>"company,subject2,state,country,postcode",

      "min"=>1,"max"=>-1,

      "cost"=>0

      ),

    "private"=>array(

      "label"=>"Private Classified",

      "add"=>"location",

      "min"=>1,"max"=>35,

      "cost"=>0

      ),

    "real-estate"=>array(

      "label"=>"Real Estate",

      "add"=>"issues,payment,location",

      "min"=>30,"max"=>-1,

      "cost"=>13000

      ),

    "real-estate-looking"=>array(

      "label"=>"Looking for Real Estate",

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>13000

      ),

    "employees"=>array(

      "label"=>"Looking for Staff", /* Previously Employees Wanted */

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>20000

      ),

    "employment"=>array(

      "label"=>"Looking for Work", /* Previous name: Employment Wanted */

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>20000

      ),

    "business-services"=>array(

      "label"=>"Business Services",

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>13000

      ),

    "hello"=>array(

      "label"=>"Hello Ads",

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>13000

      ),

    "cars"=>array(

      "label"=>"Cars, Motorcycle, Watercraft, etc.",

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>13000

      ),

    "pets"=>array(

      "label"=>"Pet Parade",

      "add"=>"issues,payment",

      "min"=>1,"max"=>-1,

      "cost"=>13000

      )

  );

  function cek_crucial($q,$item){

    $crucial=($item!="fax");

    if (in_array($q,array("display","contact-us","contact-map"))) $crucial=(in_array($item,array("name","email","subject")));

    else if(in_array($q,array("subscribe"))) $crucial=(in_array($item,array("name","address","city","state","postcode","country","email","payment")));

    else $crucial=(in_array($item,array("name","email","phone")));

    return $crucial;

  }

  if ( !array_key_exists($_GET['q'],$ads) ){ ?>

    <h3>Please use <a href="<?php echo get_permalink( 5 ); ?>">the main ads category</a> to place your ads</h3>

  <?php } else { $q=$_GET['q']; global $post; ?>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/qaptcha/jquery.validate.min.js"></script>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/qaptcha/additional-methods.min.js"></script>

    <style>

      #ad_form td { vertical-align:middle; }

      #ad_form .important { color:red; position:relative; top:-30px; right:3px; text-align:right; height:0px; font-size:3em; }

      #ad_form input.error { border:1px solid red;}

      #ad_form textarea.error { border:1px solid red;}

      #ad_form label.error { display:none !important; }

      #ad_form input, #ad_form textarea, #ad_form select { border:1px solid gray; width:100%; padding:10px;}

      #ad_form fieldset { margin:2%; }

      #ad_form .note { text-align:center; margin-top:15px; }

      #ad_form textarea { resize:vertical; }

      #ad_form td { padding-bottom:1em;}

      #ad_form .footnote { font-size:0.8em; text-align:center;}

      #ad_preview, #contact_preview, #ad_processing, #confirmation_alert, #check_alert, #minword_alert { display:none; position:fixed;top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.7); z-index:999; }

      #check_slide { display:none; position:fixed;top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.7); z-index:1001; }

    #ad_preview > #adpreviewcontent,  #ad_processing > #proc_content, #confirmation_alert > #alert_content, #check_alert > #check_content, #check_slide > #slide_content, #minword_alert > #minword_content { background:white; padding:1em; z-index:1000; position: fixed; top: 55%; left: 50%; transform: translate(-50%, -53%); -webkit-transform: translate(-50%, -53%); -moz-transform: translate(-50%, -53%); -o-transform: translate(-50%, -53%); -ms-transform: translate(-50%, -53%);/*max-height:75%;overflow:auto;*/ }

      #check_alert > #check_content > #check_summary { padding:0 1em 2em 1em; overflow-y: auto;}

      #confirmation_alert > #alert_content > #alert_summary { padding:0 1em 2em 1em; overflow-y: auto;}

      #check_slide > #slide_content > #slide_summary { padding:0 1em 2em 1em; overflow-y: auto;}

      #ad_preview > #adpreviewcontent > #ad_summary { padding: 1em 1em 0;}

      #minword_alert > #minword_content > #minword_summary { padding:0 1em 2em 1em; overflow-y: auto;}

      #ad_summary p {line-height: 22px;}

      #ad_processing > #proc_content > #proc_summary { text-align: center; padding: 15px; }

      #adpreviewcontent{min-width: 450px;}

      #contact_content{min-width: 450px;}

      @media (min-width: 650px){

        #ad_form fieldset.col2 { width:46% !important; margin:2% 1%; display:inline-block; vertical-align:top;  }

      }

    </style>

    <?php

      if ($q=="contact-map") {

        echo '<div class="row wow fadeInUp"><h3>Our Location</h3>';

        echo do_shortcode('[wpgmza id="1"]');

        echo "</div>";

      }

    ?>



      <?php if ($q=="contact-map" || $q=="display" ){ ?>

          <h3><?php echo $ads[$q]['label'];?></h3>

      <?php } elseif($q=="subscribe"){ ?>

        <div class="center-content">

          <h3>SUBSCRIBE TO BALI ADVERTISER</h3>

            <p>Subscribe to Bali Advertiser today. Delivery by mail worldwide:</p>

            <p>Domestic by Regular Post<br>

              International by Airmail</p>

              <h3>SUBSCRIPTION RATES</h3>

              <p><span class="form-title">Indonesia :</span> <span class="form-con">Rp. 450,000 one year</span><br>

                <span class="form-title">ASEAN &amp; Australia :</span> <span class="form-con">US$ 350.00 one year</span><br>

                <span class="form-title">Europe &amp; Middle East :</span><span class="form-con">US$ 550.00 one year</span><br>

                <span class="form-title">USA :</span><span class="form-con">US$ 575.00 one year</span><br>

                Above prices are including 10% goverment tax.</p>

                <h3>SUBSCRIPTION FORM</h3>

              </div>

      <?php } else{ ?>

        <h3>Place An Ad - <?php echo $ads[$q]['label'];?></h3>

      <?php } ?>



    <form id="ad_form" action="<?php echo get_template_directory_uri(); ?>/chilly.php?q=confirm" method="post">

      <input type="hidden" name="uri" id="uri" value="<?php echo get_template_directory_uri(); ?>">

      <input type="hidden" name="form_uri" id="form_uri" value="<?php echo get_template_directory_uri(); ?>/chilly.php?q=confirm">

      <input type="hidden" value="confirm" id="act" name="act">

      <input type="hidden" value="<?php echo $ads[$q]['label']; ?>" id="adtype" name="adtype">

      <input type="hidden" value="0" id="total" name="total">

      <input type="hidden" value="0" id="wc" name="wc">

      <input type="hidden" value="<?php echo $ads[$q]['cost'];?>" id="cost" name="cost">

      <fieldset class="col2">

        <legend>Your Details :</legend>

        <table width="100%">

          <?php if($q=="contact-us" || $q=="contact-map") $tc=array("name","phone","email","subject");

                else if($q=="display") $tc=array("name","phone","email","subject2");

                else if($q=="subscribe") $tc=array("name","address","city","state","postcode","country");

                else $tc=array("name","phone","email");

            foreach ($tc as $item){

            $crucial=cek_crucial($q,$item);

            if ($item=="address" && $q=="private") continue;

            if ($item=="subject"){?>

                <tr>

                  <td><label for="subject">Subject :</label></td>

                  <td>

                      <?php foreach(array("more_info"=>"More Information - please give specific details","price_request"=>"Price Request - please give specific details","suggestion"=>"Suggestion - type your suggestion below") as $key=>$sitem){?>

                        <input type="radio" checked="checked" name="subject" style="width:auto;margin-right:3px;" value="<?php echo ucwords(str_replace("_"," ",$key));?>"><?php echo ($sitem);?></br>

                      <?php } ?>

                  </td>

                  <!--<td><select id="subject" name="subject">

                      <?php //foreach(array("more_info"=>"More Information - please give specific details","price_request"=>"Price Request - please give specific details","suggestion"=>"Suggestion - type your suggestion below") as $key=>$sitem){?>

                      <option value="<?php //echo ucwords(str_replace("_"," ",$key));?>"><?php //echo $sitem;?></option>

                      <?php //} ?>

                    </select>

                  </td>-->

                </tr>

                <?php }

                  else if($item == "subject2"){?>

                    <tr>

                      <td><label for="subject">Subject :</label></td>

                      <td>

                          <?php foreach(array("more_info"=>"More Information - please give specific details","price_request"=>"Price Request - please give specific details") as $key=>$sitem){?>

                            <input type="radio" checked="checked" name="subject" style="width:auto;margin-right:3px;" value="<?php echo ucwords(str_replace("_"," ",$key));?>"><?php echo ($sitem);?></br>

                          <?php } ?>

                      </td>

                    </tr>

          <?php }

            else if($item == "address"){?>

              <tr>

                <td><label for="<?php echo $item;?>"><?php echo ucwords($item);?> :</label></td>

                <td style="position:relative;">

                  <textarea id="<?php echo $item;?>" name="<?php echo $item;?>" required="required"></textarea>

                  <div class="important" style="top: 12px;/*right: 12px;*/position: absolute;">*</div>

                </td>

              </tr>

          <?php }

          else {

          ?>

          <tr>

            <td><label for="<?php echo $item;?>"><?php echo ucwords($item);?> :</label></td>

            <td><input id="<?php echo $item;?>" name="<?php echo $item;?>" type="text" <?php if ($crucial) { ?>required="required"><div class="important">*</div><?php } ?></td>

          </tr>

          <?php } } ?>

        </table>

        <?php if (in_array($q,array("employment"."private"))){?><div class="important" style="font-size:0.9em;padding:1em;text-align:center;">Contact Details Here Are For Office Use Only</div><?php }?>

      </fieldset>

      <fieldset class="col2">

        <legend>Extra Information :</legend>

        <table width="100%">

          <?php foreach (array("email","phone","fax","company","location","state","country","postcode","issues","payment","subscribecomments") as $item){

            $crucial=cek_crucial($q,$item);

              if (in_array($item,explode(",",$ads[$q]['add'])))

                switch($item) {

                case "email" : ?>

                <tr>

                  <td><label for="<?php echo $item;?>"><?php echo ucwords($item);?> :</label></td>

                  <td><input id="<?php echo $item;?>" name="<?php echo $item;?>" type="email" required="required"><div class="important">*</div></td>

                </tr>

                <?php break;

                case "location" : ?>

                <tr>

                  <td><label for="location"><?php if($q=="private") {echo 'Item Location :';}else{echo 'Property Location :';} ?></label></td>

                  <td><select id="location" name="location">

                      <?php foreach(array("specify the location", "Bedugul", "Bukit", "Canggu", "Denpasar", "Gianyar", "Jimbaran", "Karangasem", "Kerobokan", "Kuta", "Legian", "Lombok", "Negara", "Nusa Dua", "Sanur", "Seminyak", "Tabanan", "Ubud", "Other") as $item){?>

                      <option value="<?php echo str_replace(" ","_",$item);?>"><?php echo ucwords($item);?></option>

                      <?php } ?>

                    </select>

                  </td>

                </tr>

                <tr><td colspan="2"><div class="footnote">* <?php if($q=="private") {echo 'Item ';}else{echo 'Property ';} ?> for sale without location specified can not be published.</div></td></tr>

                <?php break;

                case "payment" : ?>

                <tr>

                  <td><label for="payment">Payment :</label></td>

                  <td>

                  <?php foreach(array("cash","bank transfer","pay pal") as $item){?>

                  <input type="radio" <?php if($item == 'cash') echo 'checked="checked"';?> name="payment" style="width:auto;margin-left:10px;margin-right:5px;" value="<?php echo ucwords($item);?>"><?php echo ucwords($item);?>

                  <?php } ?>

                  </td>

                  <!--<td><select id="payment" name="payment">-->

                      <?php //foreach(array("cash","bank transfer","pay pal") as $item){?>

                      <!--<option value="<?php //echo ucwords($item);?>"><?php //echo ucwords($item);?></option>-->

                      <?php //} ?>

                    <!--</select></td>-->

                </tr>

                <?php break;

                case "issues" : ?>

                <tr>

                  <td><label for="issues">Issues :</label></td>

                  <td><input id="<?php echo $item;?>" name="<?php echo $item;?>" type="number" min="1" value="1" <?php if ($crucial) { ?>required="required"><div class="important">*</div><?php } ?></td>

                  <!--<td><select id="issues" name="issues">-->

                      <?php //for ($i=1;$i<=26;$i++){?>

                      <!--< value="<?php //echo $i;?>"><?php //echo $i;?> Issue<?php //echo ($i>1)?"s":""; ?></option>-->

                      <?php //} ?>

                    <!--</select></td>-->

                </tr>

                <?php break;

                case "subscribecomments" : ?>

                <tr>

                  <td><label for="<?php echo $item;?>">Comments :</label></td>

                  <td><textarea id="<?php echo $item;?>" name="<?php echo $item;?>" style="height: 85px;" ></textarea></td>

                </tr>

                <?php break;

                default: ?>

                <tr>

                  <td><label for="<?php echo $item;?>"><?php echo ucwords($item);?> :</label></td>

                  <td><input id="<?php echo $item;?>" name="<?php echo $item;?>" type="text" <?php if ($crucial) { ?>required="required"><div class="important">*</div><?php } ?></td>

                </tr>

          <?php } } ?>

        </table>

      </fieldset>

      <fieldset>

        <?php if (!in_array($q,array("display","contact-us", "contact-map","subscribe"))) { ?>

        <legend>Ad Content</legend>

        <div class="important" style="top:10px;">*</div>

        <textarea id="adtextareacontent" name="adtextareacontent" required="required" rows="10" placeholder="Enter your ad content here including a contact phone number or email address for replies to this ad."></textarea>



        <div class="footnote">* Please ensure that you have included your contact phone number and/or e-mail address for replies to this ad in the ad text that you are typing here.<br>

        ** Ads with email addresses receive more replies</div>



        <div class="note">

        <div class="col-sm-4" style="margin-bottom:15px">Word Count : <span id="wcount">0</span></div>

        <div class="col-sm-4" style="margin-bottom:15px">Price Per Word : Rp. <span class='currency'><?php echo $ads[$q]['cost'];?></span> <?php if ($ads[$q]['min']>1) echo "<br>( Minimum <span id='min'>".$ads[$q]['min']."</span> Words ) ";?> <?php if ($ads[$q]['max']>-1) echo "<br>( Maximum ".$ads[$q]['max']." Words ) ";?></div>

        <div class="col-sm-4" style="margin-bottom:15px">Total Cost : Rp. <span id="tcost">0</span></div>

        </div>

          <?php } elseif(in_array($q,array("subscribe"))) { ?>

        <?php } else { ?>

        <legend>Comments</legend>

        <div class="important" style="top:10px;">*</div>

        <textarea id="comments" name="comments" required="required" rows="10"></textarea>

        <h3>CONTACT US</h3>

        <p style="text-align:center">

          Street Address :<br>

          Bali Advertiser<br>

          Jl. Majapahit No. 46<br>

          Kuta, Bali<br>

          Indonesia

        </p>

        <div style="text-align:center; margin-bottom:15px;" class="col-sm-4">Tel: +62 (0)361 755392</div>

        <div style="text-align:center; margin-bottom:15px;" class="col-sm-4">E-mail: <a href="mailto:info@baliadvertiser.biz">info@baliadvertiser.biz</a></div>

        <div style="text-align:center; margin-bottom:15px;" class="col-sm-4">Fax: +62 (0)361 764191</div>



        <?php } ?>

        <nav role="navigation" class="navigation paging-navigation col-sm-12" style="margin-top:2em;">

          <div class="nav-links chilly">

            <a href="#" class="next page-numbers" id="ad_confirm">Next »</a>

          </div>

        </nav>

      </fieldset>

    </form>

    <div id="ad_processing">

      <div id="proc_content">

        <div id="proc_summary"></div>

      </div>

    </div>

    <div id="confirmation_alert">

      <div id="alert_content">

        <div id="alert_summary">

          <p></p>

          <div class="nav-links chilly nav_summary">

            <a href="#" class="prev page-numbers" id="alert_change">« Change Ad</a>

          </div>

        </div>

      </div>

    </div>

    <div id="check_slide">

      <div id="slide_content">

        <div id="slide_summary">

          <p></p>

          <div class="nav-links chilly nav_summary">

            <a href="#" class="prev page-numbers" id="slide_change">« Back</a>

          </div>

        </div>

      </div>

    </div>

    <div id="check_alert">

      <div id="check_content">

        <div id="check_summary">

          <p></p>

          <div class="nav-links chilly nav_summary">

            <a href="#" class="prev page-numbers" id="check_change">« Change Ad</a>

            <a href="#" class="prev page-numbers" id="check_ok"> Continue »</a>

          </div>

        </div>

      </div>

    </div>

    <div id="minword_alert">

      <div id="minword_content">

        <div id="minword_summary">

          <p></p>

          <div class="nav-links chilly nav_summary">

            <a href="#" class="prev page-numbers" id="minword_change">« Change Ad</a>

            <a href="#" class="prev page-numbers" id="minword_ok"> Continue »</a>

          </div>

        </div>

      </div>

    </div>

    <div id="ad_preview">

      <div id="adpreviewcontent">

        <div id="ad_summary"></div>

        <div class="nav-links chilly nav_summary">

          <a href="#" class="prev page-numbers" id="ad_change">« Change Ad</a>

          <a href="#" class="next page-numbers" id="adbuttonplace">Place Ad »</a>

        </div>

        <div class="nav-links chilly nav_summary" style="display:none">

          <a href="<?php echo bloginfo("wpurl");?>/place-an-ad" class="prev page-numbers" id="adbuttonclose">Close window</a>

        </div>

      </div>

    </div>



    <script>

    (function($) {

      $(function() {

        function recalc(){



          <?php if (!in_array($q,array("display","contact-us", "contact-map", "subscribe"))) { ?>

          wc = $("#adtextareacontent").val().split(/[\n\r]| /).filter(function(e){return e}).length;

          $("#wcount").html(wc); $("#wc").val(wc<?php //if ($ads[$q]['min']>1) echo $ads[$q]['min']; else echo "wc"; ?>);

          // $("#issues").val(Math.abs($("#issues").val()))

          // if ($("#issues").val() == 0) {

          //  $("#issues").val(1);

          // }

          // $("#issues").val().replace(/[^0-9\.]/g,'');

          //$("#issues").html($("#issues").val());

            if(wc > 30){$("#total").val((parseInt($("#cost").val() ) * wc * Math.abs($("#issues").val())).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));}

            else{$("#total").val((parseInt($("#cost").val() ) * <?php if ($ads[$q]['min']>1) echo $ads[$q]['min']; else echo "wc"; ?> * Math.abs($("#issues").val())).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));}

	    // If value is NaN -> make it 0
            // To fix private ads price of NaN
            if(isNaN(parseInt($("#total").val()))){
              $("#total").val(0);
            }

          $("#tcost").html($("#total").val());

          return wc;

          <?php } ?>

        }

        $("#adtextareacontent").keyup(function(){ recalc(); });

        $("#issues").keyup(function(){ recalc(); });

        $("#issues").mouseup(function(){ recalc(); });

        $(".currency").each(function(){

          $(this).html( $(this).html().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );

        });

        recalc();



        /* confirmation box */

        $("#ad_confirm").click(function(e){

          //check min & max words

          e.preventDefault();





          if (<?php echo $ads[$q]['max'];?>>-1 && recalc() > <?php echo $ads[$q]['max'];?>) {

            //alert("Your message have to be at most <?php echo $ads[$q]['max'] ?> words !");

            $("#confirmation_alert > #alert_content > #alert_summary > p").html("Your message have to be at most <?php echo $ads[$q]['max'] ?> words !");

            $("#confirmation_alert").fadeIn("slow");

          }



          else if ($("#issues").val()<1) {

            //alert("Please ensure the Issue has a valid number format");

            $("#confirmation_alert > #alert_content > #alert_summary > p").html("Please ensure the issues has a valid number format.");

            $("#confirmation_alert").fadeIn("slow");

          }



          else if (!$("#ad_form").valid()) {

            //alert("Please ensure all required fields are completed with valid information.");

            <?php if (!in_array($q,array("contact-us", "contact-map", "subscribe"))) { //confirmation only if not contact us?>

              $("#confirmation_alert > #alert_content > #alert_summary > p").html("Please ensure all required fields are completed with valid information.");

              $("#confirmation_alert").fadeIn("slow");

            <?php }

            else{ ?>

            $("#confirmation_alert > #alert_content > #alert_summary > p").html("Please ensure all required fields are completed with valid information.");

            $("#alert_change").text('<< Back')

            $("#confirmation_alert").fadeIn("slow");

            <?php } ?>

          }



          else if ($("#location").val()=="specify_the_location") {

            //alert("Please select a location");

            $("#confirmation_alert > #alert_content > #alert_summary > p").html("Please select a location");

            $("#confirmation_alert").fadeIn("slow");

          }





          else {

            if (<?php echo $ads[$q]['min'];?>>1 && recalc() < <?php echo $ads[$q]['min'];?>) {

              $("#minword_alert > #minword_content > #minword_summary > p").html("Minimum payment is for <?php echo $ads[$q]['min'] ?> words, you can go back and enter another "+(<?php echo $ads[$q]['min'] ?>-recalc())+" for the same price.");

              $("#minword_alert").fadeIn("slow");



            }else{



            <?php if (!in_array($q,array("contact-us", "contact-map", "subscribe"))) { //confirmation only if not contact us?>

              $("#check_alert > #check_content > #check_summary > p").html("Please confirm that you have entered a contact number or email address for replies to this ad in the body of your ad content, ads without contact details cannot be published.");

              $("#check_alert").fadeIn("slow");

            <?php }

            else{ ?>

              $("#ad_processing > #proc_content > #proc_summary").html("Processing..."); $("#ad_processing").fadeIn("slow");



              $("#ad_preview > #adpreviewcontent > #ad_summary").load($("#ad_form").attr("action"),{"info":$("#ad_form").serialize()},function(){

                $("#ad_processing").fadeOut("slow");

                $("#ad_preview").fadeIn("slow");

                <?php if($q == "subscribe"){ ?> $('a#adbuttonplace').text('Subscribe >>'); $('a#ad_change').text('<< Change'); <?php } ?>

                <?php if($q == "contact-map"){ ?> $('a#adbuttonplace').text('Send >>'); $('a#ad_change').text('<< Change'); <?php } ?>

              });

            $("input.error").attr("placeholder","this field is required");

            <?php } ?>

          }}});



          $("#contact_change").click(function(e){ $("#contact_preview").fadeOut("slow"); e.preventDefault();});

          $("#alert_change").click(function(e){ $("#confirmation_alert").fadeOut("slow"); e.preventDefault();});

          $("#check_change").click(function(e){ $("#check_alert").fadeOut("slow"); e.preventDefault();});

          $("#slide_change").click(function(e){ $("#check_slide").fadeOut("slow"); e.preventDefault();});

          $("#minword_change").click(function(e){ $("#minword_alert").fadeOut("slow"); e.preventDefault();});

          $("#minword_ok").click(function(e){

             $("#minword_alert").fadeOut("slow", function(){

                $("#check_alert > #check_content > #check_summary > p").html("Please confirm that you have entered a contact number or email address for replies to this ad in the body of your ad content, ads without contact details cannot be published.");

                $("#check_alert").fadeIn("slow");

             });}

           );

          $("#check_ok").click(function(e){

            $("#check_alert").fadeOut("slow", function(){

              //e.preventDefault();

              $("#ad_processing > #proc_content > #proc_summary").html("Processing..."); $("#ad_processing").fadeIn("slow", function(){

                $("#ad_preview > #adpreviewcontent > #ad_summary").load($("#ad_form").attr("action"),{"info":$("#ad_form").serialize()},function(){

                  $("#ad_processing").fadeOut("slow", function(){

                      $("#ad_preview").fadeIn("slow");

                  });



                });

              });

            });





          });

      });

    })(jQuery);

    </script>

  <?php }

}

?>
