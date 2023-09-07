@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-5">Tabel log harian dari {{ $name }}</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Body
                  </th>
                  <th>
                    tanggal
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    update
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logs as $item)                    
                  <tr>
                    <td>
                      {{ $item->id }}
                    </td>
                    <td>
                      {{ $item->body }}
                    </td>
                    <td>
                      {{ $item->date }}
                    </td>
                    <td>
                      @if ($item->status == 'disetujui')
                        <p class="badge badge-success">
                      @elseif($item->status == 'pending')   
                        <p class="badge badge-warning">
                      @else
                        <p class="badge badge-danger">
                      @endif
                          {{ $item->status }}</p>
                    </td>
                    <td>
                      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#staff{{ $item->id }}">
                        Verifikasi
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="staff{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Verifikasi daily log</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="/staff/log/{{ $item->id }}">
                                @csrf
                                <div class="form-group">
                                  <select name="status" class="form-control">
                                    <option value="disetujui">disetujui</option>
                                    <option value="ditolak">ditolak</option>
                                  </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>

                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
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