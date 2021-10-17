@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Beli Cash</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cash.store') }}" method='POST' id="f-cash">
        @csrf

    <div class="row">
        <div class="col-lg-6">
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihPelangganModal">
        Pilih Data Pembeli
        </button>
  
        <!-- Modal -->
        <div class="modal fade" id="pilihPelangganModal" tabindex="-1" aria-labelledby="pilihPelangganModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-dark">
                <h5 class="modal-title" id="pilihPelangganModalLabel">Pilih Data Pembeli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    <table id="tbl-pelanggan" class="table table-striped table-md">
                        <thead>
                        <tr>
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
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pembeli->ktp_pembeli }}</td>
                                <td>{{ $pembeli->nama_pembeli }}</td>
                                <td>{{ $pembeli->alamat_pembeli }}</td>
                                <td>{{ $pembeli->telp_alamat }}</td>
                                <td><button class='pilih-pelanggan' type="button">Pilih</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body bg-secondary">
                <h3>Data Pembeli</h3>
                <div class=" col-lg-12 mt-3 mb-3">    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No Ktp</label>
                        <input type="text" class="form-control" id="v-ktp_pembeli" name="ktp_pembeli">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="v-nama_pembeli" name="nama_pembeli">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="v-alamat_pembeli" name="alamat_pembeli">
                        </div>
                    <div class="mb-3">
                        <label for="exampleInputTelepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="v-telp_alamat" name="telp_alamat">
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="col-lg-6">
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihMobilModal">
        Pilih Data Mobil
        </button>
  
        <!-- Modal -->
        <div class="modal fade" id="pilihMobilModal" tabindex="-1" aria-labelledby="pilihMobilModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-dark">
                <h5 class="modal-title" id="pilihMobilModalLabel">Pilih Data Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    <table id="tbl-mobil" class="table table-striped table-md">
                        <thead>
                            <tr class="text">
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
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mobil->kode_mobil }}</td>
                                <td>{{ $mobil->merek_mobil }}</td>
                                <td>{{ $mobil->tipe_mobil }}</td>
                                <td>{{ $mobil->warna_mobil }}</td>
                                <td>{{ $mobil->harga_mobil }}</td>
                                <td><img src="{{ asset('storage/' . $mobil->gambar_mobil) }}" alt="" width="72" height="57"> </td>
                                <td><button class='pilih-mobil' type="button">Pilih</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body bg-secondary">
                <h3>Data Mobil</h3>
                <div class=" col-lg-12 mt-3 mb-3">
                    <div class="mb-3">
                        <label for="exampleInputKode" class="form-label">Kode Mobil</label>
                        <input type="text" class="form-control" id="v-kode_mobil" name="kode_mobil">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputMerk" class="form-label">Merk</label>
                        <input type="text" class="form-control" id="v-merek_mobil" name="merek_mobil">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTipe" class="form-label">Tipe</label>
                        <input type="text" class="form-control" id="v-tipe_mobil" name="tipe_mobil">
                        </div>
                    <div class="mb-3">
                        <label for="exampleInputWarna" class="form-label">Warna</label>
                        <input type="text" class="form-control" id="v-warna_mobil" name="warna_mobil">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputHarga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="v-harga_mobil" name="harga_mobil">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body bg-secondary">
            <h3>Pembayaran</h3>
            <div class=" col-lg-12 mt-3 mb-3">
                <form class="col-lg-6">
                <div class="mb-3">
                    <label for="exampleInputTgl" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="v-cash_tgl" name="cash_tgl">
                </div>
                <div class="mb-3">
                    <label for="exampleInputBayar" class="form-label">Pembayaran</label>
                    <input type="text" class="form-control" id="v-cash_bayar" name="cash_bayar" placeholder="Tulis dalam Satuan Juta">
                </div>
                </form>
                <div style="text-align:right">
                    <button class="btn btn-primary" type="submit">Bayar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
@push('script')
    <script>
    $(function(){
        $('#tbl-pelanggan').DataTable();
        $('#tbl-pelanggan').on('click', '.pilih-pelanggan', function(){
                let ele = $(this).closest('tr');
                let ktp_pembeli = ele.find('td:eq(1)').text();
                let nama_pembeli = ele.find('td:eq(2)').text();
                let alamat_pembeli = ele.find('td:eq(3)').text();
                let telp_alamat = ele.find('td:eq(4)').text();
                $('#v-ktp_pembeli').val(ktp_pembeli)
                $('#v-nama_pembeli').val(nama_pembeli)
                $('#v-alamat_pembeli').val(alamat_pembeli)
                $('#v-telp_alamat').val(telp_alamat)
                $('#pilihPelangganModal').modal('hide')
            });
        
        $('#tbl-mobil').DataTable();
        $('#tbl-mobil').on('click', '.pilih-mobil', function(){
                let ele = $(this).closest('tr');
                let kode_mobil = ele.find('td:eq(1)').text();
                let merek_mobil = ele.find('td:eq(2)').text();
                let tipe_mobil = ele.find('td:eq(3)').text();
                let warna_mobil = ele.find('td:eq(4)').text();
                let harga_mobil = ele.find('td:eq(5)').text();
                $('#v-kode_mobil').val(kode_mobil)
                $('#v-merek_mobil').val(merek_mobil)
                $('#v-tipe_mobil').val(tipe_mobil)
                $('#v-warna_mobil').val(warna_mobil)
                $('#v-harga_mobil').val(harga_mobil)
                $('#pilihMobilModal').modal('hide')
            });

        //validasi pemilihan pembeli dan mobil
        $('#f-cash').submit(function(e){
            e.prevenDefault();
            if($('#v-ktp_pembeli').val() == ""){
                alert('data pembeli belum dipilih')
            }else if($('#v-kode_mobil').val() == ""){
                alert('data mobil belum dipilih')
            }else{
                e.currentTarget.submit()
            }
        })
    })
    </script>
@endpush

@endsection
