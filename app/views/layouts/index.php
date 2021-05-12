<?php
require "header.php";
?>

<header class="header">
  <div class="row">
    <div class="col-md-12 text-center">
      <a class="logo"><img src="images/logo.png" alt="logo"></a>
</header>



<!--about us section-->

<section id="intro">

  <div class="container" style="margin-top: 50px;">
    <h3 class="text-center"><br>Introduction<br></h3><hr>
    <div class="row">
      <!--carousel-->
      <div class="col-sm"><br><br>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block intro-img" src="images/unnamed.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block intro-img" src="images/viva.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block intro-img" src="images/alone.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><br><br>
      </div>

      <!--end of carousel-->

      <div class="col-sm">
        <div class="arranging"><br><br>
<!--			<br>-->
          <hr>
          <h4 class="text-center">About Music Hub</h4><br>
          <p class="p1">
            Music Hub is a website created by <b>HxH group</b>
          <p class="p0">
            This website provides you hours of immersive music experienece
            from listening to your favourite songs, watching MVs, viewing artists' information, catching up on the trending news about music industry, ...
            <br>
            Have fun!!!
            <br>
            <img src="images/signature.png" alt="signature" style="display: block;
  						margin-left: auto;
  						margin-right: auto;">
          </p>
          </p>
          <hr>
        </div>
      </div>
    </div><br>
  </div>
</section>
<!--end of about us section-->

<!----gallery -->
<div class id="gallery"><br>
  <div class="container">
    <h3 class="text-center"><br>Gallery<br>
      <hr><br>
    </h3>
    <div class="d-flex flex-row flex-wrap justify-content-center">
      <div class="d-flex flex-column">
        <img src="images/jimi.jpeg" class="img-fluid">
        <img src="images/dave.jpg" class="img-fluid">
      </div>
      <div class="d-flex flex-column">
        <img src="images/drake.jpg" class="img-fluid">
        <img src="images/album2.jpg" class="img-fluid">
      </div>
      <div class="d-flex flex-column">
        <img src="images/album1.jpg" class="img-fluid">
        <img src="images/alanw.jpg" class="img-fluid">
      </div>
      <div class="d-flex flex-column">
        <img src="images/album3.jpg" class="img-fluid">
        <img src="images/album4.jpg" class="img-fluid">
      </div>
    </div>
    <br><br>
  </div>
</div><br><br>
<!----end of gallery -->
<!--<div class="container" style="margin-top:10px; margin-bottom: 10px;">-->
<div class="text-center" id="about-us">
  <h3>About us</h3>
  <hr class="hr1">
  <br>We are a team of 4 members:<br>
  <ul>
    <li>
      Tran Phi Hung
    </li>
    <li>
      Le Thanh Son
    </li>
    <li>
      Dao Hong Quan
    </li>
    <li>
      Nguyen Tri Hung
    </li>
  </ul>
  <br />
</div>

<!--</div><br><br>-->


<?php
require "footer.php";
?>