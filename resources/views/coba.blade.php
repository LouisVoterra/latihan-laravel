<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <h1>Selamat datang, {{ $name }}!</h1>
    <script>
        var app = <?php echo json_encode($name); ?>;

        var apps = @json($name);
        var appss = @json($name, JSON_PRETTY_PRINT);
    </script>
</body>
</html>