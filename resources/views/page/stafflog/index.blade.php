@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-5">Table Persetujuan log harian karyawan</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Nama staff
                  </th>
                  <th>
                    posisi
                  </th>
                  <th>
                    log harian
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($staff as $item)                    
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      {{ $item->name }}
                    </td>
                    <td>
                      {{ $item->position }}
                    </td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="/staff/{{ $item->id }}">lihat</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection