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
                  <h4 class="card-title">{{ $item[0]->format('l') }}</h4>
                  <p class="text-black">{{ $item[0]->format('d/m/Y') }}</p>
                  <div class="row">
                    <div class="col-md-2">
                      <p class="badge @if($item[1]) bg-success @else bg-warning @endif text-white">
                        @if ($item[1])
                            Sudah di isi 
                        @else 
                            Belum di isi
                        @endif
                      </p>
                    </div>
                    <div class="col">
                      @if ($item[1])
                        <p class="badge @if($item[2]->status == 'disetujui') bg-success @elseif($item[2]->status == 'ditolak') bg-danger @else bg-warning @endif text-white">
                            {{ $item[2]->status }}
                        </p>
                        @endif
                    </div>
                  </div>

                </div>
                <div class="col-md-4">
                  @if ($item[1])
                    <button class="btn btn-behance btn-sm" data-toggle="modal" data-target="#view{{ $item[0]->format('Ymd') }}">view</button>
                    <div class="modal fade" id="view{{ $item[0]->format('Ymd') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Log</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="/mylog">
                              @csrf
                              <input type="hidden" name="date" value="{{ $item[0]->format('Y-m-d') }}">
                              <div class="form-group">
                                <label for="body">body</label>
                                <textarea name="body" class="form-control" cols="30" rows="10">{{ $item[2]->body }}</textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  @else 
                  @if(new DateTime($item[0]->format('Y-m-d')) > new DateTime('now')) 
                    <button type="button" class="btn btn-primary btn-sm {{ $item[0]->format('Y-m-d') }}" style="cursor:not-allowed;">add</button>
                  @else

                    <button type="button" data-toggle="modal" data-target="#date{{ $item[0]->format('Ymd') }}" class="btn btn-primary btn-sm {{ $item[0]->format('Y-m-d') }}" @if(new DateTime($item[0]->format('Y-m-d')) > new DateTime('now')) style="cursor:not-allowed;" @endif >add</button>

                    <div class="modal fade" id="date{{ $item[0]->format('Ymd') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Log</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="/mylog">
                              @csrf
                              <input type="hidden" name="date" value="{{ $item[0]->format('Y-m-d') }}">
                              <div class="form-group">
                                <label for="body">body</label>
                                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
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
                  @endif 
                  @endif
                  
                  
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