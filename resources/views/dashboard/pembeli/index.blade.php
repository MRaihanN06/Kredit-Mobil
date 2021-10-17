@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pembeli</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Create New Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-dark">
            <h5 class="modal-title" id="exampleModalLabel">Input New Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-dark">
            <form action="/dashboard/pembeli" method="POST" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="ktp_pembeli" class="form-label">No KTP</label>
                <input type="text" class="form-control @error('ktp_pembeli') is-invalid @enderror" id="ktp_pembeli" name="ktp_pembeli" required autofocus value="{{ old('ktp_pembeli') }}">
                @error('ktp_pembeli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror" id="nama_pembeli" name="nama_pembeli" required value="{{ old('nama_pembeli') }}">
                @error('nama_pembeli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="alamat_pembeli" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat_pembeli') is-invalid @enderror" id="alamat_pembeli" name="alamat_pembeli" required value="{{ old('alamat_pembeli') }}">
                @error('alamat_pembeli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="telp_alamat" class="form-label">No Telepon</label>
                <input type="text" class="form-control @error('telp_alamat') is-invalid @enderror" id="telp_alamat" name="telp_alamat" required value="{{ old('telp_alamat') }}">
                @error('telp_alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark btn-outline-primary border-0">Create Post</button>
          </div>
        </form>
        </div>
      </div>
    </div>

        <table class="table table-striped table-md text-light">
          <thead>
            <tr class="text-light">
              <th scope="col">No</th>
              <th scope="col">No KTP</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pembeli as $pembeli)
                <tr class="text-light">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembeli->ktp_pembeli }}</td>
                    <td>{{ $pembeli->nama_pembeli }}</td>
                    <td>{{ $pembeli->alamat_pembeli }}</td>
                    <td>{{ $pembeli->telp_alamat }}</td>
                    <td>

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $pembeli->ktp_pembeli }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdrop{{ $pembeli->ktp_pembeli }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header text-dark">
                              <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                              <form action="{{ url('dashboard/pembeli/'.$pembeli->ktp_pembeli) }}" method="POST" class="mb-5" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                  <label for="ktp_pembeli" class="form-label">No KTP</label>
                                  <input type="text" class="form-control @error('ktp_pembeli') is-invalid @enderror" id="ktp_pembeli" name="ktp_pembeli" required autofocus value="{{ old('ktp_pembeli', $pembeli->ktp_pembeli) }}">
                                  @error('ktp_pembeli')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="nama_pembeli" class="form-label">Nama</label>
                                  <input type="text" class="form-control @error('nama_pembeli') is-invalid @enderror" id="nama_pembeli" name="nama_pembeli" required value="{{ old('nama_pembeli', $pembeli->nama_pembeli) }}">
                                  @error('nama_pembeli')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="alamat_pembeli" class="form-label">Alamat</label>
                                  <input type="text" class="form-control @error('alamat_pembeli') is-invalid @enderror" id="alamat_pembeli" name="alamat_pembeli" required value="{{ old('alamat_pembeli', $pembeli->alamat_pembeli) }}">
                                  @error('alamat_pembeli')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="telp_alamat" class="form-label">Warna Mobil</label>
                                  <input type="text" class="form-control @error('telp_alamat') is-invalid @enderror" id="telp_alamat" name="telp_alamat" required value="{{ old('telp_alamat', $pembeli->telp_alamat) }}">
                                  @error('telp_alamat')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-dark border-0">Edit Post</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                        <form action="{{ url('dashboard/pembeli/'.$pembeli->ktp_pembeli) }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger border-0" onclick="return confirm('Anda Yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

@endsection
