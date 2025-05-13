@extends('layouts.adminlte4')



@section('content')
<br>
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="container">
  <div class="form-group">
    <form method="POST" action="{{ route('formOrder.store') }}">
      @csrf 
      <label for="category_id">Pilih Menu</label>
      <select name="food_id" class="form-control">
        @foreach($menu as $c)
          <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group mt-3">
        <label for="customer_name">Masukkan Nama Pelanggan</label>
        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Nama Pelanggan" required>
      </div>

      <div class="form-group mt-3">
          <label for="quantity">Jumlah</label>
          <div class="input-group" style="max-width: 200px;">
            <button type="button" class="btn btn-outline-secondary" onclick="ubahJumlah(-1)">−</button>
            <input type="number" id="quantity" name="quantity" class="form-control text-center" value="1" min="1">
            <button type="button" class="btn btn-outline-secondary" onclick="ubahJumlah(1)">+</button>
          </div>
        </div>
                  
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

<script>
  function ubahJumlah(value) {
    var input = document.getElementById('quantity');
    var newValue = parseInt(input.value) + value;
    if (newValue >= 1) {
      input.value = newValue;
    }
  }
</script>

@endsection  