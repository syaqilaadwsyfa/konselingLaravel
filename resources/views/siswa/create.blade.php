@extends('template.master')

@section('title', 'Siswa')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Add Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  {{-- <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Enter Judul Anda">
                  </div>
                  @error('judul')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="Number" name="genre" class="form-control" id="genre" placeholder="Enter Genre Anda">
                    <select name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                          @forelse ( $genres as $value )
                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                          @empty
                          <option disabled>--Data Masih Kosong--</option>
                          @endforelse
                    </select>
                  </div>
                  @error('genre')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror --}}
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="Enter Nis Anda">
                  </div>
                  @error('nis')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter Nama Anda">
                 </div>
                 @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror" placeholder="Enter alamat Anda"></textarea>
                  </div>
                  @error('alamat')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="mb-2">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @forelse ($kelas as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->kelas }}</option>
                        @empty
                            <option disabled>--Data Masih Kosong--</option>
                        @endforelse
                    </select>
                </div>
                @error('kelas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  {{-- <div class="form-group">
                    <label>Kelas</label>
                    <select type="text" name="kelas" class="form-control">
                        <option disabled selected>Pilih Kelas</option>
                        <option value="X RPL 1">X RPL 1</option>
                        <option value="X RPL 2">X RPL 2</option>
                        <option value="X RPL 1">XI RPL 1</option>
                        <option value="X RPL 2">XI RPL 2</option>
                        <option value="X RPL 1">XII RPL 1</option>
                        <option value="X RPL 2">XII RPL 2</option>
                        <option value="X TKJ 1">X TKJ 1</option>
                        <option value="X TKJ 2">X TKJ 2</option>
                        <option value="X TKJ 1">XI TKJ 1</option>
                        <option value="X TKJ 2">XI TKJ 2</option>
                        <option value="X TKJ 1">XII TKJ 1</option>
                        <option value="X TKJ 2">XII TKJ 2</option>
                        <option value="X DPIB 1">X DPIB 1</option>
                        <option value="X DPIB 2">X DPIB 2</option>
                      </select>
                  </div> --}}
                  <div class="form-group">
                    <label for="no_telp_ortu">No Telepon Orangtua</label>
                    <input type="number" name="no_telp_ortu" class="form-control @error('no_telp_ortu') is-invalid @enderror" id="no_telp_ortu" placeholder="Enter No Telp Orangtua Anda">
                  </div>
                  @error('no_telp_ortu')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select type="text" name="jk_anggota" class="form-control">
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="no_telp_ortu">Tanggal Lahir</label>
                    <input type="date" name="no_telp_ortu" class="form-control @error('no_telp_ortu') is-invalid @enderror" id="no_telp_ortu" placeholder="Enter Tanggal Lahir Anda">
                  </div>
                  {{-- @error('jenis_kelamin')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror --}}
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Enter Agama Anda">
                  </div>
                  @error('agama')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="tahun_angkatan">Tahun Angkatan</label>
                    <input type="text" name="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" id="tahun_angkatan" placeholder="Enter Tahun Angkatan Anda">
                  </div>
                  @error('tahun_angkatan')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </div>
        </div>
           </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" class="btn btn-secondary" style="margin-left: 8px;" data-toggle="modal" data-target="#exampleModal">Kembali</a>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </section>
      </div><!-- /.container-fluid -->
      <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Siswa</h5>
            </div>
            <div class="modal-body">
              <p>Anda yakin akan kembali ke halaman Data Genre?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              <a href="{{ route('siswa.index') }}" type="button" class="btn btn-primary">Kembali</a>
            </div>
          </div>
        </div>
    <!-- /.content -->
@endsection
