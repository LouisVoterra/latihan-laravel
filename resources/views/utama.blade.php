<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman Utama Food Order</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"/>

  <!-- Gaya Desert Theme -->
  <style>
    body {
      background-color: #f7e9d2; /* desert sand */
      color: #5e3c23;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    h1 {
      font-weight: bold;
    }
    .btn-primary {
      background-color: #a97142;
      border-color: #a97142;
      width: 200px;
    }
    .btn-primary:hover {
      background-color: #8a5c2d;
      border-color: #8a5c2d;
    }
    .carousel-inner img {
      height: 300px;
      object-fit: cover;
      border-radius: 12px;
    }
  </style>
</head>
<body>

  <div class="container text-center mt-5">

    <!-- Carousel -->

    <div class="container-fluid px-0">
        <div id="mainCarousel" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="https://media.istockphoto.com/id/1457433817/photo/group-of-healthy-food-for-flexitarian-diet.jpg?s=612x612&w=0&k=20&c=v48RE0ZNWpMZOlSp13KdF1yFDmidorO2pZTu2Idmd3M=" alt="Healthy Food">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="https://img.freepik.com/free-photo/top-view-table-full-delicious-food-composition_23-2149141352.jpg" alt="Salad">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="https://media.istockphoto.com/id/1829241109/photo/enjoying-a-brunch-together.jpg?s=612x612&w=0&k=20&c=9awLLRMBLeiYsrXrkgzkoscVU_3RoVwl_HA-OT-srjQ=" alt="Natural Ingredients">
            </div>
        </div>
        <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        </div>
    </div>
    

    <!-- Content -->
    <h1 class="mb-3">Food Order Kiosk</h1>
    <p class="mb-4">Food Order Kiosk merupakan usaha yang bergerak di bidang kuliner, khususnya makanan sehat. Saat ini, Kiosk menghadirkan teknologi baru dengan memberikan layanan terbaik untuk konsumen.</p>

    <a href="{{ url('before_order') }}" class="btn btn-primary btn-lg">Start Order</a>
  </div>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>


