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
              <h3 class="card-title">Form Pelanggaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pelanggaran.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="number" name="nis" class="form-control" value="{{ $pelanggaran->nis }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pelanggaran->nama }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="{{ $pelanggaran->kelas }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="pelanggaran">Pelanggaran</label>
                    <input type="text" name="pelanggaran" class="form-control" value="{{ $pelanggaran->pelanggaran }}" disabled>
                  </div>
                <div class="form-group">
                  <label for="catatan">Catatan</label>
                  <input type="text" name="catatan" class="form-control" id="catatan" value="@if ($pelanggaran->catatan == "L")Laki-laki
                      @else Perempuan
                  @endif" disabled>
                </div>
                <div class="form-group">
                    <label for="tgl_pelanggaran">Tgl Pelanggaran</label>
                    <input type="date" name="tgl_pelanggaran" class="form-control" value="{{ $pelanggaran->tgl_pelanggaran }}" disabled>
                  </div>
                <div class="form-group">
                    <label for="tindakan">Tindakan</label>
                    <input type="text" name="tindakan" class="form-control" value="{{ $pelanggaran->tindakan }}" disabled>
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
          <h5 class="modal-title">Detail Pelanggaran</h5>
        </div>
        <div class="modal-body">
          <p>Anda yakin akan kembali ke halaman Data Pelanggaran?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a href="{{ route('pelanggaran.index') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
