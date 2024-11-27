<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Carousel</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
   
    <div class="carousel-item active">
    
    <a href="http://localhost/sneaker_hub/home/allproducts.php">
    <img src="images/Home banner 1.png" class="d-block w-100" alt="banner1">
</a>
      
    </div>
    <div class="carousel-item">
    <a href="http://localhost/sneaker_hub/home/allproducts.php">
      <img src="images/Home banner 2.png" class="d-block w-100" alt="banner2" >
</a>
    </div>
    <div class="carousel-item">
    <a href="http://localhost/sneaker_hub/home/allproducts.php">
</a>
      <img src="images/Home banner 3.png" class="d-block w-100" alt="banner3" >
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = document.querySelector('#carouselExampleIndicators');
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 2000, 
      ride: 'carousel'
    });
  });
</script>

</body>
</html>
