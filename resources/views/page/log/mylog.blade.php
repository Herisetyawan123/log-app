@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($list_week as $item)
      <div class="col-md-12 mb-2">
          <a href="/mylog/{{ $item[0]->format('Y-m-d') }}" class="text-decoration-none">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                Log Harian (Mingguan)
              </h4>
              <p class="card-description">
                {{ $item[0]->format('d M Y') }} - {{ $item[1]->format('d M Y') }}
              </p>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>
@endsection