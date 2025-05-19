@extends('layouts.adminlte4')

@section('content')
<div class="container">
  <h2>Basic Table</h2>
  
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table w-100">
    <thead>
      <tr>
        <th>#</th>
        <th>Customer Name</th>


        <th>Total Price</th>
        <th>Transaction Date</th>
        <th colspan='2' style='text-align: center;'>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($listorder as $f)
            <tr>
                <td>{{ $f->id}}</td>
                <td>{{ $f->customer_name}}</td>
                <td>{{ $f->total_price}}</td>
                <td>{{ $f->transaction_date}}</td>
                <td>
             <a class="btn btn-warning" href="{{ route('listtransaksi.edit', $f->id) }}">Edit</a> 
            </td>
            <td>
              <form action = "{{ route('listtransaksi.destroy', $f->id) }}" method = "POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger"
                onclick="return confirm('Are you sure to delete {{ $f->id }} -  {{ $f->customer_name}} ? ')">
             </form>
            </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection  