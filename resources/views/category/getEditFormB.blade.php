<h3>Update Category</h3>
 <form method="POST" action="{{ route('listkategori.update',$data->id) }}">
       @csrf
       @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="ename" name="name" aria-describedby="name" placeholder="Enter Category Name" value="{{ $data->name }}">
            <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
        </div>
        <button type="submit" class="btn btn-primary" onClick="saveDataUpdate({{ $data->id }})">Submit</button>
    </form>