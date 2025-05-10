@extends('layouts.adminlte4')

@section('content')
<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Number of foods</th>
        <th>list name of foods</th> 
      </tr>
    </thead>
    <tbody>
    @foreach($kategori as $f)
          <tr>
            <td>{{ $f->id}}</td>
            <td>{{ $f->name}}</td>
            <td>{{ count($f->foods)}}</td>
            <td>
                @foreach($f->foods as $i)
                  {{ $i->name }}
                @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    <!-- <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach($kategori as $f)
            <tr>
                <td>{{ $f->id}}</td>
                <td>{{ $f->name}}</td>
            </tr>
        @endforeach
    </tbody> -->

  </table>
</div>
@endsection  