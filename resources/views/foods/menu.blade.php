@extends('layouts.adminlte4')
@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!-- Centered -->
            <div class="col-md-6"> <!-- Set width to 50% on medium+ screens -->
                <form method="POST" action="{{ route('listmakanan.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Masukkan nama Makanan</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Makanan">
                    </div>
                    <div class="form-group">
                        <label for="nutrition_fact">Masukkan informasi nutrisi</label>
                        <input type="text" class="form-control" id="nutrition_fact" name="nutrition_fact" placeholder="Masukkan informasi nutrisi">
                    </div>
                    <div class="form-group">
                        <label for="description">Masukkan deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan description">
                    </div>
                    <div class="form-group">
                        <label for="price">Masukkan Harga</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan price">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Pilih Kategori</label>
                        <select name="category_id" class="form-control">
                            @foreach($kategori as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
    