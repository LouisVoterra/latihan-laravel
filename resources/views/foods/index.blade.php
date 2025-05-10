@extends('layouts.adminlte4')

@section('content')
<div class="container">
  <h2>Basic Table</h2>
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
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection  