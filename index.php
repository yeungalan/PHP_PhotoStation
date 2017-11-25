<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- Tocas UI：CSS 與元件 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tocas-ui/2.3.3/tocas.css">
<!-- Tocas JS：模塊與 JavaScript 函式 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tocas-ui/2.3.3/tocas.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>


	<div class="ts grid">
	<div class="ts two wide column">
  
        <h1>分類</h1><br>
		<?php

$dirs = array_filter(glob('image/*'), 'is_dir');
foreach($dirs as $dir) {
  echo '<a href="index.php?dir='.$dir.'">'.str_replace("image/","",$dir).'</a><br>';
}

?>
        
 
</div>
<div class="ts ten wide column">
<div class="ts grid">
<?php
if(isset($_GET["dir"]) && $_GET["dir"] !== ""){
	$loaddir = $_GET["dir"];
}else{
	$loaddir = "image/P6Graddin/";
}

$files = glob($loaddir.'\*.{JPG,jpg}', GLOB_BRACE);
foreach($files as $file) {
  echo '<div class="four wide column"><a  onmousedown="chk(this);" href="https://test.alanyeung.co/photostation/'.$file.'" class="ts link small image"  id="'.$file.'">
    <img src="https://test.alanyeung.co/photostation/genthumb.php?src='.$file.'&size=%3C150">
</a></div>';
}

?>

<div class="ts contextmenu">
    <div class="item" id="zoom" onclick="">
        放大
    </div>
    <div class="divider"></div>
    <div class="item" id="download" onclick="">
        下載
    </div>
</div>
</div>
	</div>
	
			<script>
ts('.small.image').contextmenu({
    menu: '.ts.contextmenu'
	
});

  function chk(ele) {
    var id = ele.id;
	document.getElementById("zoom").setAttribute("onclick", "location.href='https://test.alanyeung.co/photostation/".concat(id.replace("\\","/"),"';")); 
	document.getElementById("download").setAttribute("onclick", "location.href='https://test.alanyeung.co/photostation/download.php?file=".concat(id.replace("\\","/"),"';")); 
    console.log('Clicked ' + id);
  }


</script>

      </body>

</html>