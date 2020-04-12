@extends('layouts.app')


@section('content')

<div class="card card-default">
  <div class="card-header">
  {{ isset($category) ? 'Edit Category' : 'Add Category' }}
  </div>

  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="list-group">
          @foreach($errors->all() as $error)
            <li class="list-group-item">
              {{ $error }}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
  
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
      @csrf
      @if(isset($category))
      @method('patch')
      @endif
      <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ isset($category) ? $category->name : '' }}">
      </div>

      <div class="form-group">
        <button class="btn btn-success">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</button>
      </div>
    </form>
  </div>
</div>

@endsection