@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($days as $item)
      <div class="col-md-12 mb-2">
          {{-- <a href="/mylog/" class="text-decoration-none"> --}}
          <div class="card">
            <div class="card-body">
              <div class="row justify-between">
                <div class="col">
                  <h4 class="card-title">{{ $item->format('l') }}</h4>
                  <p class="text-black">{{ $item->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-3">
                  <p class="badge bg-success text-white">sudah</p>
                  <button class="btn btn-primary">add</button>
                </div>
              </div>
            </div>
          </div>
          {{-- </a> --}}
      </div>
    @endforeach
  </div>
</div>
@endsection