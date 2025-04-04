<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dining Location</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
  </style>
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">Dining Location</h1>
        
        <div class="d-flex flex-column align-items-center">
            <a href="{{ url('menu/dinein') }}" class="btn btn-primary btn-lg mb-3" style="width: 200px;">
                Dine-In
            </a>
            <a href="{{ url('menu/takeaway') }}" class="btn btn-primary btn-lg" style="width: 200px;">
                Take Away
            </a>
        </div>
    </div>
    
</body>
</html>