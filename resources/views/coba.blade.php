<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <h1>Selamat datang, {{ $name }}!</h1>
    <a href= "{{ url('admins/member ') }}" > List Member</a>
    <a href= "{{ route('listmember') }} "> List Member (Route) </a>

    
    
    <script>
        // var app = <?php echo json_encode($name); ?>; //versi php native

        // var apps = @json($name);
        // var appss = @json($name, JSON_PRETTY_PRINT);     //versi blade
        
        


    </script>
</body>
</html> 