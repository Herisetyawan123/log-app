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
                    isi
                  </th>
                  <th>
                    status
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    Herman Beck
                  </td>
                  <td>
                    <button class="btn btn-sm btn-primary">lihat</button>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-warning">Pending</button>
                  </td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection