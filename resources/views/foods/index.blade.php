@extends('layouts.adminlte4')

@section('content')
<div class="container">
  <h2>Basic Table</h2>
  <a href=" {{ route('listmakanan.create') }}" class="btn btn-primary mt-3">+ Add New Foods</a>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table w-100">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Description</th>
        <th>Nutrition Facts</th>
        <th>Price</th> 
        <th colspan='2' style='text-align: center;'>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($makanans as $f)
            <tr>
                <td>{{ $f->id}}</td>
                <td><a href="{{ route('listmakanan.show',$f->id) }}">{{ $f->name}}</a></td>
                <td>{{ $f->category->name}}</td>
                <td>{{ $f->description}}</td>
                <td>{{ $f->nutrition_fact}}</td>
                <td>{{ $f->price}}</td>
                <td>
             <a class="btn btn-warning" href="{{ route('listmakanan.edit', $f->id) }}">Edit</a> 
            </td>
            <td>
              <form action = "{{ route('listmakanan.destroy', $f->id) }}" method = "POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger"
                onclick="return confirm('Are you sure to delete {{ $f->id }} -  {{ $f->name}} ? ')">
             </form>
            </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection  