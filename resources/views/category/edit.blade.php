@extends('layouts.adminlte4')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <form method="POST" action ="{{ route('listkategori.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $listkategori->name }}" required
            placeholder="Enter category name" aria-describedby="name">
            <small id="name" class="form-text text-muted"></small>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>

    
</body>
</html>
@endsection