@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-end mb-2">
  <a href=" {{ route('categories.create')  }} " class="btn btn-success">Add  Category</a>
</div>
<div class="card card-default">
  <div class="card-header">
    Categories
  </div>

  <div class="card-body">
    <table class="table">
      <thead>
        <th>Name</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>
              <a href="{{route('categories.edit', $category->id )}}" class="btn btn-primary">Edit</a>
              <button class="btn btn-danger" onclick="handleDelete({{ $category->id }})">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
      <form action="#" method="post" id="deleteForm">
        @csrf
        @method('delete')
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure want to delete this category?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete Category</button>
          </div>
        </div>
      </form>
      </div>
    </div>

    
  </div>
</div>


@endsection

@section('script')
<script>
  const handleDelete  = (helo) => {
    const form = document.getElementById('deleteForm');
    form.action = '/categories/' + helo;
    console.log(form);
    $('#deleteModal').modal('show');
  };  
 </script>
@endsection