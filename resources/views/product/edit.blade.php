@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', 'Update product information')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit product</div>
        <div class="card-body">
          @if($errors->any())
          <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('product.update', ['id' => $viewData['product']['id']]) }}">
            @csrf
            @method('PUT')
            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name', $viewData['product']['name']) }}" />
            <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price', $viewData['product']['price']) }}" />
            <textarea class="form-control mb-2" placeholder="Enter description" name="description">{{ old('description', $viewData['product']['description']) }}</textarea>
            <input type="submit" class="btn btn-primary" value="Update" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection