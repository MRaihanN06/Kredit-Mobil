@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Mobil</h1>
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
            <form action="/dashboard/mobil" method="POST" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="kode_mobil" class="form-label">Kode Mobil</label>
                <input type="text" class="form-control @error('kode_mobil') is-invalid @enderror" id="kode_mobil" name="kode_mobil" required autofocus value="{{ old('kode_mobil') }}">
                @error('kode_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="merek_mobil" class="form-label">Merek Mobil</label>
                <input type="text" class="form-control @error('merek_mobil') is-invalid @enderror" id="merek_mobil" name="merek_mobil" required value="{{ old('merek_mobil') }}">
                @error('merek_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="tipe_mobil" class="form-label">Tipe Mobil</label>
                <input type="text" class="form-control @error('tipe_mobil') is-invalid @enderror" id="tipe_mobil" name="tipe_mobil" required value="{{ old('tipe_mobil') }}">
                @error('tipe_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="warna_mobil" class="form-label">Warna Mobil</label>
                <input type="text" class="form-control @error('warna_mobil') is-invalid @enderror" id="warna_mobil" name="warna_mobil" required value="{{ old('warna_mobil') }}">
                @error('warna_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="harga_mobil" class="form-label">Harga Mobil</label>
                <input type="text" class="form-control @error('harga_mobil') is-invalid @enderror" id="harga_mobil" name="harga_mobil" required value="{{ old('harga_mobil') }}">
                @error('harga_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="gambar_mobil" class="form-label">Post Image</label>
                  <input class="form-control @error('image') is-invalid @enderror" type="file" id="gambar_mobil" name="gambar_mobil">
                  @error('gambar_mobil')
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
              <th scope="col">Kode Mobil</th>
              <th scope="col">Merk</th>
              <th scope="col">Tipe</th>
              <th scope="col">Warna</th>
              <th scope="col">Harga</th>
              <th scope="col">Gambar</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($mobil as $mobil)
                <tr class="text-light">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mobil->kode_mobil }}</td>
                    <td>{{ $mobil->merek_mobil }}</td>
                    <td>{{ $mobil->tipe_mobil }}</td>
                    <td>{{ $mobil->warna_mobil }}</td>
                    <td>{{ $mobil->harga_mobil }}</td>
                    <td><img src="{{ asset('storage/' . $mobil->gambar_mobil) }}" alt="" width="72" height="57"> </td>
                    <td>

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#ganti{{ $mobil->kode_mobil }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="ganti{{ $mobil->kode_mobil }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-2" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header text-dark">
                              <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                              <form action="{{ url('dashboard/mobil/'.$mobil->kode_mobil) }}" method="POST" class="mb-5" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                  <label for="kode_mobil" class="form-label">Kode Mobil</label>
                                  <input type="text" class="form-control @error('kode_mobil') is-invalid @enderror" id="kode_mobil" name="kode_mobil" required autofocus value="{{ old('kode_mobil', $mobil->kode_mobil) }}">
                                  @error('kode_mobil')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="merek_mobil" class="form-label">Merek Mobil</label>
                                  <input type="text" class="form-control @error('merek_mobil') is-invalid @enderror" id="merek_mobil" name="merek_mobil" required value="{{ old('merek_mobil', $mobil->merek_mobil) }}">
                                  @error('merek_mobil')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="tipe_mobil" class="form-label">Tipe Mobil</label>
                                  <input type="text" class="form-control @error('tipe_mobil') is-invalid @enderror" id="tipe_mobil" name="tipe_mobil" required value="{{ old('tipe_mobil', $mobil->tipe_mobil) }}">
                                  @error('tipe_mobil')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="warna_mobil" class="form-label">Warna Mobil</label>
                                  <input type="text" class="form-control @error('warna_mobil') is-invalid @enderror" id="warna_mobil" name="warna_mobil" required value="{{ old('warna_mobil', $mobil->warna_mobil) }}">
                                  @error('warna_mobil')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="harga_mobil" class="form-label">Harga Mobil</label>
                                  <input type="text" class="form-control @error('harga_mobil') is-invalid @enderror" id="harga_mobil" name="harga_mobil" required value="{{ old('harga_mobil', $mobil->harga_mobil) }}">
                                  @error('harga_mobil')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_mobil" class="form-label">Post Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="gambar_mobil" name="gambar_mobil" value="{{ old('gambar_mobil', $mobil->gambar_mobil) }}">
                                    @error('gambar_mobil')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button id="ganti" type="submit" class="btn btn-dark border-0">Edit Post</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                        <form action="{{ url('dashboard/mobil/'.$mobil->kode_mobil) }}" method="post" class="d-inline">
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
