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
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('siswa.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="number" name="nis" class="form-control" value="{{ $siswa->nis }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" disabled>{{ $siswa->alamat }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $siswa->tgl_lahir }}" disabled>
                  </div>
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="@if ($siswa->jenis_kelamin == "L")Laki-laki
                      @else Perempuan
                  @endif" disabled>
                </div>
                <div class="form-group">
                    <label for="no_telp_ortu">No Telepon Orangtua</label>
                    <input type="number" name="no_telp_ortu" class="form-control" value="{{ $siswa->no_telp_ortu }}" disabled>
                  </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" class="form-control" value="{{ $siswa->agama }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="tahun_angkatan">Tahun Angkatan</label>
                    <input type="number" name="tahun_angkatan" class="form-control" value="{{ $siswa->tahun_angkatan }}" disabled>
                  </div>
                <a href="" class="btn btn-secondary" style="margin-left: 8px;" data-toggle="modal" data-target="#exampleModal">Back</a>

                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Back</a> --}}

              </div>

          </div>
          <!-- /.card -->
    {{-- </div><!-- /.container-fluid --> --}}
  </section>

  <!-- /.content -->
</div>
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Siswa</h5>
        </div>
        <div class="modal-body">
          <p>Anda yakin akan kembali ke halaman Data Siswa?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a href="{{ route('siswa.index') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
