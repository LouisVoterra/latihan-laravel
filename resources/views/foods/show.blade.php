<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Detail Food</h2>
  <br><br>
  <div class="card" style="width:400px">
    <img class="card-img-top" src="https://assets.promediateknologi.id/crop/180x92:1151x725/0x0/webp/photo/p3/93/2024/09/25/Desain-tanpa-judul-1347548481.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{ $current_food->name}}</h4>
      <p class="card-text">{{$current_food->description}}</p>
      <p class="card-text">{{$current_food->nutrition_fact}}</p>
      <p class="card-text">{{$current_food->price}}</p>
      <a href="{{ route('listmakanan.index') }}" class="btn btn-primary">Back</a>

    </div>
  </div>
  <br>
</body>
</html>
