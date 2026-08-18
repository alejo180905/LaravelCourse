@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]["name"] }}
        </h5>
        <p class="card-text">{{ $viewData["product"]["description"] }}</p>
        <p class="card-text"><strong>${{ number_format($viewData["product"]["price"], 2) }}</strong></p>
        <a href="{{ route('product.edit', ['id' => $viewData['product']['id']]) }}" class="btn btn-primary">Edit</a>
        <form method="POST" action="{{ route('product.destroy', ['id' => $viewData['product']['id']]) }}" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">Comments</div>
  <div class="card-body">
    @forelse ($viewData["product"]->comments as $comment)
      <p class="mb-1">- {{ $comment->content }}</p>
    @empty
      <p class="mb-0">No comments yet.</p>
    @endforelse
  </div>
</div>
@endsection
