<?php 
$render_mode=0;
if ($_GET['render']!=''){$render_mode=1;}
?>
<!DOCTYPE>
<html>
<head>

<?php if ($render_mode==1&&$_GET['t']!=''){ ?>
<title><?php echo $_GET['t']; ?></title>
<?php }else if ($render_mode==1&&$_GET['t']==''){ ?>
<title><?php echo "Rendered Inks (".md5($_GET['render']); ?>)</title>
<?php }else{
  ?><title>Scanned Site - Whole site in a QR code</title>
<?php
} ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />
<?php //if ($render_mode==0)
{ ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="qrcode.js"></script>
<script src="//cdn.quilljs.com/1.3.2/quill.min.js"></script>
<link href="//cdn.quilljs.com/1.3.2/quill.snow.css" rel="stylesheet">
<?php } ?>

<style>

  body > #standalone-container {
    margin: 50px auto;
    width: 100%;
  }
  #editor-container {
  	height: 50px;
  }
</style>

</head>
<body>


<header id="header"  <?php   if ($render_mode==1)
{ ?>class="hidden-xs"<?php } ?>>
<div class="row" style="margin:0px;padding:5px;">
<a href="/"><img src="reactinklogo.png" alt="Scanned Site Logo" height="30" /></a>

<div style="font-size: 8pt; padding-top: 7px; display: inline-block;" class="hidden-xs">
This is an experienmental project by Armin Nikdel to enable printing guides and documents on paper as QR Code © All rights reserved 2017 <button class="btn btn-default" onclick="alert('I\'ve made this during my free time as an experiment. You create a page in the left side, and as you are creating, it keep generate a QR code for what you have created on the left side.\n\nPage contents are all saved inside of QR code. You can print the QR code or save it somewhere, your printed paper will be your host.\n\nUpon scanning the QR code, your QR reader will read codes and codes will be sent to scanned.site to render.');";>About</button> <button class="btn btn-default" onclick="alert('You need to use a PC to create a page. and copy/save/print QR code generated for that page. QR code will have all your page contents inside. Nothing is saved elsewhere, all are right inside of that QR code. You use your phone to scan QR code and it will read codes from QR code and render page that you created.');";>How It Works</button> <button class="btn  btn-default" onclick="alert('Contact me via sanarena at gmail');";>Contact</button> 
</div>

<div class="visible-xs"><br><br>You need to use a desktop computer to create a page and generate QR code. then open that QR code using your phone QR scanner. <br></div>

</div>
</header>

<div class="row" style="margin:0px;padding:0px;">
<div class="col-md-6 hidden-print" style="margin:0px;padding:0px;">


<div id="standalone-container">
  <div id="toolbar-container"  <?php if ($render_mode==1)
{ ?>class="hidden-xs"<?php } ?>>
    <span class="ql-formats">
      <select class="ql-font"></select>
      <select class="ql-size"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-bold"></button>
      <button class="ql-italic"></button>
      <button class="ql-underline"></button>
      <button class="ql-strike"></button>
    </span>
    <span class="ql-formats">
      <select class="ql-color"></select>
      <select class="ql-background"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-script" value="sub"></button>
      <button class="ql-script" value="super"></button>
    </span>
    <span class="ql-formats">
      <button class="ql-header" value="1"></button>
      <button class="ql-header" value="2"></button>
      <button class="ql-blockquote"></button>
      <button class="ql-code-block"></button>
    </span>
    <span class="ql-formats">
      <button class="ql-list" value="ordered"></button>
      <button class="ql-list" value="bullet"></button>
      <button class="ql-indent" value="-1"></button>
      <button class="ql-indent" value="+1"></button>
    </span>
    <span class="ql-formats">
      <button class="ql-direction" value="rtl"></button>
      <select class="ql-align"></select>
    </span>
    <!--
    <span class="ql-formats">
      <button class="ql-link"></button>
      <button class="ql-image"></button>
      <button class="ql-video"></button>
      <button class="ql-formula"></button>
    </span>
-->
    <span class="ql-formats">
      <button class="ql-clean"></button>
    </span>
  </div>
  <div id="editor-container">
    
<?php echo $_GET['render']; ?>
  </div>
</div>





</div>
<div class="col-md-6" style="margin:0px;padding:0px;" class="qrcodeholder">
	<table border="0" width="100%;" id="qrcodetbl"><tr><td align="center"><div id="qrcode" style="display: inline;text-align: center;"></div></td></tr></table></div>
</div>




<script>
	
	var itimer;
	var qrcode = new QRCode(document.getElementById("qrcode"), {
    text: "http://scanned.site",
    width: 512,
    height: 512,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
	var qrtext = "";
	function updateqr(){
		clearTimeout(itimer);
		itimer=window.setTimeout(function(){
		newtext=$(".ql-editor").html();//getText
		if (newtext!=qrtext){
		qrcode.clear(); // clear the code.
		qrcode.makeCode("http://scanned.site/?render="+encodeURIComponent(newtext)); // make another code.
		qrtext=newtext;
		}
		},200);
	}

function recalcsize(){
	$("#editor-container").height(window.innerHeight-$("#header").height()-$("#toolbar-container").height()-20);
	$("#qrcodetbl").height(window.innerHeight-$("#header").height());
	imgsquare="100%";

	if ($("#qrcode").find("img").height()<(window.innerHeight-$("#header").height())){
		imgsquare=$("#editor-container").width();
	}else{
		
		imgsquare=window.innerHeight-$("#header").height();
	}
	$("#qrcode").find("img").width(imgsquare);

	
}
window.setInterval(function(){recalcsize();},1000);

	$( window ).resize(function() {recalcsize();})
	$( window ).on("load",function() {recalcsize()})

  var quill = new Quill('#editor-container', {
    modules: {
      formula: true,
      syntax: true,

      toolbar: '#toolbar-container'
    },
    placeholder: 'Create your page...',
    theme: 'snow'
  });

quill.on('editor-change', function() {updateqr();});

</script>


<!-- Hitsteps TRACKING CODE - Manual 2017-09-16 - DO NOT CHANGE -->
<script>aid=26296;sid=52326;</script>
<script type="text/javascript">(function(){var hstc=document.createElement('script');var hstcs='www.';if (document.location.protocol=='https:') hstcs='';hstc.src=document.location.protocol+'//log.hitsteps.com/track.js';hstc.async=true;var htssc = document.getElementsByTagName('script')[0];htssc.parentNode.insertBefore(hstc, htssc);})();
</script><noscript><a href="http://www.hitsteps.com/"><img src="//log.hitsteps.com/track.php?mode=img&amp;code=45105277b3d8fc78f1304dc126ea2033" alt="visitor activity tracker" width="1" height="1" />visitor activity monitoring</a></noscript>
<!-- Hitsteps TRACKING CODE - DO NOT CHANGE -->
</body>
</html>