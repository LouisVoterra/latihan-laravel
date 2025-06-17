@extends('layouts.adminlte4')

@section('content')
@push("script")
<script>
    function showInfo() { //nama function
      $.ajax({ 
        type: 'POST', //tipe http untuk kirim data
        url: '{{ route("category.showInfo") }}', //rute url untuk kirim data
        data: '_token=<?php echo csrf_token(); ?>', //token csrf untuk keamanan
        success: function(data) {  
          $('#showInfo').html(data.msg); //menampilkan data yang dikirim dari controller ke div showinfo
        }
      });
    }
 
    function showHighestFood(){
      $.ajax({
        type: 'POST',
        url: '{{ route("category.showHighestFood") }}',
        data: '_token=<?php echo csrf_token(); ?>',
        success: function(data) {
          $('#showHighestFood').html(data.msg);
        }
      });
    }

  
    function showDetail(id) {
      $.ajax({
        type: 'POST',
        url: '{{ route("category.showListFoods") }}',
        data: { 
                '_token': '<?php echo csrf_token(); ?>',
                'idcat': id,
              },
        success: function(data) {
          $('#detail-title').html(data.title);
          $('#detail-body').html(data.body);
        }
      });
    }



    function getEditForm(id)
    {
      $.ajax({
      type:'POST',
      url:'{{route("kategori.getEditForm")}}',
      data: {
        '_token' : '<?php echo csrf_token() ?>',
        'id': id
      },
      success: function(data){
        $('#modalContent').html(data.msg)
      }
      });
    }


    function getEditFormB(id){
      $.ajax({
        type:'POST',
        url:'{{route("kategori.getEditFormB")}}',
        data: {
          '_token' : '<?php echo csrf_token() ?>',
          'id': id
        },
        success: function(data){
          $('#modalContentB').html(data.msg)
        }
      });
    }

    function saveDataUpdate(id) {
      var name = $('#ename').val(); 
      console.log(name);

      $.ajax({
        type: 'POST',
        url: '{{ route("kategori.saveDataUpdate") }}',
        data: {
          '_token': '{{ csrf_token() }}',
          'id': id,
          'name': name
        },
        success: function(data) {
          if (data.status == 'oke') {
            $('#td_name_' + id).html(name); // langsung pakai name juga bisa
            $('#modalEditB').modal('hide');
            alert('Data updated successfully!');
          }
        }
      });
    }

    function deleteDataRemove(id){
      $.ajax({
        type: 'POST',
        url: '{{ route("kategori.deleteData") }}',
        data: {
          '_token': '<?php echo csrf_token() ?>',
          'id': id
        },
        success: function(data){
          if(data.status == 'oke'){
            $('#tr_'+id).remove(); //menghapus baris tr dengan id yang sesuai
          }
        }
      });
    }


  </script>
@endpush

  @if(@session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
  @endif

<div class="container">
  <br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
  </button>   
  <a href=" {{ route('listkategori.create') }}" class="btn btn-primary ">+ New Category</a>
  <br><br>
  <button type=button class="btn btn-primary" data-bs-toggle = "modal" data-bs-target = "#btnFormModal"> New Category with modal</button>
  <br>
  <h2>Category with Hover Rows</h2>
  <p>The <a  href="#" onclick="showInfo()">.table-hover</a> class enables a hover state on table rows. The Highest amount of food is <a href="#" onclick="showHighestFood()">Click Here!</a></p>
  <div id="showInfo"></div>
  <div id="showHighestFood"></div>

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Show Image</th>
        <th>Name</th>
        <th>Number of foods</th>
        <th>list name of foods</th> 
        <th colspan='2' style=" text-align: center;">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($kategori as $f)
          <tr id="tr_{{ $f->id }}">  <!--tambahan  -->
            <td>{{ $f->id}}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#imageModal-{{$f->id}}">Show</button>
                <!-- imageModal -->
       @push('modals')
            <!-- Modal {{ $f->id }} -->
            <div class="modal fade" id="imageModal-{{ $f->id }}" tabindex="-1" aria-labelledby="imageModalLabel" 
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="imageModalLabel">Gambar untuk Kategori {{$f->id}} </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="{{ asset('storage/category/'.$f->image) }}" alt="Gambar Kategori" class="img-fluid"/>
                    {{ $f->id }} - {{ $f->name }}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   
                  </div>
                </div>
              </div>
            </div>



            <div class = "modal fade" id="btnFormModal" tabindex = "-1" role="basic" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" >Add New Category</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action=" {{ route('listkategori.store') }} ">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                placeholder="Enter Category Name">
                            <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- modal ini untuk handle button yg intinya bakal refresh web saat send data -->

            <div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-wide">
                <div class="modal-content" >
                    <div class="modal-body" id="modalContent">
                        {{-- You can put animated loading image here... --}}
                    </div>
                </div>
            </div>
          </div> 

          <!-- bedanya ini ga ngerefresh web -->

          <div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-wide">
                <div class="modal-content" >
                    <div class="modal-body" id="modalContentB">
                        {{-- You can put animated loading image here... --}}
                    </div>
                </div>
            </div>
          </div> 




            @endpush

            </td>
            <td id="td_name_{{ $f->id }}">{{ $f->name}}</td>
            <td>{{ count($f->foods)}}</td>
            <td>
                <!-- @foreach($f->foods as $i)
                  {{ $i->name }}
                @endforeach -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal" 
                onclick="showDetail({{ $f->id }})">Details
              </button>
            </td>
            <td>
             <a class="btn btn-warning" href="{{ route('listkategori.edit', $f->id) }}">Edit</a> 
             <a href="#modalEditA" class="btn btn-warning" data-bs-toggle="modal" onclick="getEditForm({{$f->id}})">Edit Type A </a> <!-- update data, tpi ngerefresh web -->
             <a href="#modalEditB" class="btn btn-info" data-bs-toggle="modal" onclick="getEditFormB({{$f->id}})">Edit Type B</a> <!-- update data, tpi gk ngerefresh web -->
             <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick = "if(confirm('Are you sure to delete {{ $f-> id }} - {{ $f-> name }} ? '))
             deleteDataRemove({{ $f->id }})">Delete No Reload</a>
            </td>
            <td>
              <form action = "{{ route('listkategori.destroy', $f->id) }}" method = "POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger"
                onclick="return confirm('Are you sure to delete {{ $f->id }} -  {{ $f->name}} ? ')">
             </form>
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

 <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Test Modal 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


   <!--buat exercise 5 -->
            <!-- Modal -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detail-title">List of </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="detail-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
@endsection  