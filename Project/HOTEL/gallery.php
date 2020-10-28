<!DOCTYPE html>
<html>
<title>Gallery(Online Hotel MAnagement System)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/gallery.css">
<style>
body{
			background-color:#CCCCCC;
}

</style>
<body>
<?php include 'header.php'; ?>
<br>
<div class="w3-content w3-display-container">
<img class="mySlides" src="Image/galleryimages/slide1.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/budget-friendly-hotels-india.jpg" height="470" style="width:100%;">
<img class="mySlides" src="Image/galleryimages/club-room-small.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/seo_hotels.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/images.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/201511301248.jpg" height="470" style="width:100%;">
<img class="mySlides" src="Image/galleryimages/mi8ekbcdrdws43ryftv3.webp" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/page_home-feature-1.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/Singapore-Marriott-p.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/cr=w_800,h_500,a_cc.webp" height="470" style="width:100%;">
<img class="mySlides" src="Image/galleryimages/669668697.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/deluxe-king-room-1600x1067-wide.jpg" height="470" style="width:100%">
<img class="mySlides" src="Image/galleryimages/Aakar_Elite_2_w.jpg" height="470" style="width:100%"><img class="mySlides" src="Image/galleryimages/premium.jpg" height="665" style="width:100%;">
<img class="mySlides" src="Image/galleryimages/Sk-Lords-Eco-Inn.jpg" height="470" style="width:100%">
<button class="w3-button w3-black w3-display-left" onClick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-black w3-display-right" onClick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</body>
</html>
