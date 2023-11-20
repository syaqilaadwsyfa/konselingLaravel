@extends('template.master')

@section('content')

{{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
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

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Edit Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="nis">Nis</label>
                  <input type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$siswa->nis}}">
                </div>
                @error('nis')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$siswa->nama}}">
                </div>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" @error('alamat') is-invalid @enderror value="{{$siswa->alamat}}">
                    </div>
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                          <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ $siswa->kelas }}">
                          <option value="X RPL 1" @if($siswa->kelas == 'X RPL 1') selected @endif>X RPL 1</option>
                          <option value="X RPL 2" @if($siswa->kelas == 'X RPL 2') selected @endif>X RPL 1</option>
                          <option value="XI RPL 1" @if($siswa->kelas == 'XI RPL 1') selected @endif>XI RPL 1</option>
                          <option value="XI RPL 2" @if($siswa->kelas == 'XI RPL 2') selected @endif>XI RPL 2</option>
                          <option value="XII RPL 1" @if($siswa->kelas == 'XII RPL 1') selected @endif>XII RPL 1</option>
                          <option value="XII RPL 2" @if($siswa->kelas == 'XII RPL 2') selected @endif>XII RPL 2</option>
                          <option value="X TKJ 1" @if($siswa->kelas == 'X TKJ 1') selected @endif>X TKJ 1</option>
                          <option value="X TKJ 2" @if($siswa->kelas == 'X TKJ 2') selected @endif>X TKJ 1</option>
                          <option value="XI TKJ 1" @if($siswa->kelas == 'XI TKJ 1') selected @endif>XI TKJ 1</option>
                          <option value="XI TKJ 2" @if($siswa->kelas == 'XI TKJ 2') selected @endif>XI TKJ 2</option>
                          <option value="XII TKJ 1" @if($siswa->kelas == 'XII TKJ 1') selected @endif>XII TKJ 1</option>
                          <option value="XII TKJ 2" @if($siswa->kelas == 'XII TKJ 2') selected @endif>XII TKJ 2</option>
                          <option value="X DPIB 1" @if($siswa->kelas == 'X DPIB 1') selected @endif>X DPIB 1</option>
                          <option value="X DPIB 2" @if($siswa->kelas == 'X DPIB 2') selected @endif>X DPIB 2</option>
                          </select>
                        </div>
                  @error('kelas')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{$siswa->tgl_lahir}}">
                  </div>
                  @error('tgl_lahir')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ $siswa->jenis_kelamin }}">
                      <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                      <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp_ortu">No Telepon Orangtua</label>
                        <input type="number" name="no_telp_ortu" id="no_telp_ortu" class="form-control @error('no_telp_ortu') is-invalid @enderror" value="{{$siswa->no_telp_ortu}}">
                      </div>
                      @error('no_telp_ortu')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" value="{{$siswa->agama}}">
                      </div>
                      @error('agama')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="tahun_angkatan">Tahun Angkatan</label>
                        <input type="number" name="tahun_angkatan" id="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" value="{{$siswa->tahun_angkatan}}">
                      </div>
                      @error('tahun_angkatan')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                {{-- <button type="submit" class="btn btn-warning" style="margin-left: 25px">Update</button>
                <a href="" class="btn btn-secondary" style="margin-left: 8px;" data-toggle="modal" data-target="#exampleModal">Back</a> --}}
              <!-- /.card-body -->

              <div class="card-footer" style="background-color: #ffffff;">
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary" style="margin-left: 8px;">Back</a>

              </div>
            </form>
          </div>
          <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->
{{-- </div> --}}
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
        </div>
        <div class="modal-body">
          <p>Anda yakin akan kembali ke halaman Data Anggota?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a href="{{ route('siswa.index') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
