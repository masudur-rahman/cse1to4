<div class="w3-content w3-section autoSlides">
  <img class="banners" src="AutoSlides/Banner1.jpg" style="background-color: #0099CC">
  <img class="banners" src="AutoSlides/Banner2.jpg" style="background-color: #199dbfff">
  <img class="banners" src="AutoSlides/Banner3.jpg" style="background-color: #36cc5dff">
  <img class="banners" src="AutoSlides/Banner4.jpg" style="background-color: #f36c35ff">
</div>
<div id = 'dots' style="text-align:center;">
  <span class="dota"></span>
  <span class="dota"></span>
  <span class="dota"></span>
  <span class="dota"></span>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("banners");
    var dots = document.getElementsByClassName("dota");
    for (i = 0; i < x.length; i++) {
       x[i].style.opacity = "0";
       //x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" activedot", "");
    }

    x[myIndex-1].style.opacity = "1";
    dots[myIndex-1].className += " activedot";
    //x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>