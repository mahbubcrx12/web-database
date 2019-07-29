
<?php 
$sliderimg = array();
foreach($fileinfo as $row){
	$silder = $loader->selectuniqe('slide_in',array('slide_id'),'file_id',$row['id']);
}?>
<div class="col-md-12">
<h2 class="w3-center">Manual Slideshow</h2>

<div class="w3-content w3-display-container">
<?php foreach($silder as $arr){
	$sliderimg[] = $arr['slide_id'];
}

$sildingimg = $loader->setinselector('uploader_info',array('*'),'id',$sliderimg);
foreach($sildingimg as $img){ ?>
  <img class="mySlides" src="<?php echo urlhelper::baseurl();?>/img/slider/<?php echo $img['Filename']; 
?>" style="width:100%; height:200px;">
  
<?php }?>
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>


</div>

