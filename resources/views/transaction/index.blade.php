@extends('layouts.adminlte4')

@section('content')
<br>
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container">
  <form method="POST" action="{{ route('formOrder.store') }}">
    @csrf

    <!-- Form input menu -->
    <div class="row mb-3">
      <div class="col-md-5">
        <label>Pilih Menu</label>
        <select id="food_select" class="form-control">
          <option value="" disabled selected>--Pilih Menu--</option>
          @foreach($menu as $c)
            <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-price="{{ $c->price }}">
              {{ $c->name }} - Rp{{ number_format($c->price, 0, ',', '.') }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <label>Jumlah</label>
        <input type="number" id="quantity" class="form-control" value="1" min="1">
      </div>
      <div class="col-md-2 d-flex align-items-end">
        <button type="button" class="btn btn-success" onclick="addItem()">OK</button>
      </div>
    </div>

    <!-- Tabel nota -->
    <table class="table table-bordered" id="order_table">
      <thead>
        <tr>
          <th>Menu</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <div class="form-group">
      <label>Total Harga</label>
      <input type="text" class="form-control" id="total_display" readonly>
    </div>

    <div class="form-group">
      <label>Nama Pelanggan</label>
      <input type="text" name="customer_name" class="form-control" required>
    </div>

    <!-- Tempat menyimpan input tersembunyi -->
    <div id="hidden_inputs"></div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
  let total = 0;
  let itemIndex = 0;

  function addItem() {
    const select = document.getElementById('food_select');
    const qty = parseInt(document.getElementById('quantity').value);
    const selected = select.options[select.selectedIndex];

    if (!select.value || qty < 1) {
      alert('Pilih menu dan jumlah minimal 1');
      return;
    }

    const name = selected.getAttribute('data-name');
    const price = parseFloat(selected.getAttribute('data-price'));
    const subtotal = price * qty;
    total += subtotal;

    // Tampilkan di tabel
    const row = `
      <tr id="row_${itemIndex}">
        <td>${name}</td>
        <td>Rp${price.toLocaleString()}</td>
        <td>${qty}</td>
        <td>Rp${subtotal.toLocaleString()}</td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeItem(${itemIndex}, ${subtotal})">Hapus</button></td>
      </tr>
    `;
    document.querySelector('#order_table tbody').insertAdjacentHTML('beforeend', row);

    // Simpan input tersembunyi
    const hidden = `
      <input type="hidden" name="food_id[]" value="${select.value}">
      <input type="hidden" name="quantity[]" value="${qty}">
    `;
    document.getElementById('hidden_inputs').insertAdjacentHTML('beforeend', hidden);

    // Update total
    document.getElementById('total_display').value = `Rp${total.toLocaleString()}`;

    // Reset
    select.selectedIndex = 0;
    document.getElementById('quantity').value = 1;
    itemIndex++;
  }

  function removeItem(index, subtotal) {
    document.getElementById(`row_${index}`).remove();
    const hidden = document.getElementById('hidden_inputs');
    const inputs = hidden.querySelectorAll('input');
    inputs[index * 2].remove();     // food_id[]
    inputs[index * 2].remove();     // quantity[]

    total -= subtotal;
    document.getElementById('total_display').value = `Rp${total.toLocaleString()}`;
  }
</script>
@endsection
