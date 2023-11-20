@extends('template.master')

@section('title', 'Pelanggaran')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Add Pelanggaran</h1>
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
              <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="Enter Nis Anda">
                  </div>
                  @error('nis')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter Nama Anda">
                 </div>
                 @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                  <div class="form-group">
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
                      <div class="form-group">
                        <label for="pelanggaran">Nama Pelanggaran</label>
                        <input type="text" name="pelanggaran" class="form-control @error('pelanggaran') is-invalid @enderror" id="pelanggaran" placeholder="Enter Pelanggaran Siswa">
                     </div>
                     @error('pelanggaran')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                     <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control @error('catatan') is-invalid @enderror" placeholder="Enter catatan Anda"></textarea>
                      </div>
                      @error('catatan')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                     <div class="form-group">
                        <label for="tgl_pelanggaran">Tanggal Pelanggaran</label>
                        <input type="date" name="tgl_pelanggaran" class="form-control @error('tgl_pelanggaran') is-invalid @enderror" id="tgl_pelanggaran" placeholder="Enter Tanggal pelanggaran Anda">
                      </div>
                      @error('tgl_pelanggaran')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="tindakan">Tindakan</label>
                        <input type="text" name="tindakan" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" placeholder="Enter tindakan Siswa">
                     </div>
                     @error('tindakan')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                </div>
                  </div>
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
              <h5 class="modal-title">Genre</h5>
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
