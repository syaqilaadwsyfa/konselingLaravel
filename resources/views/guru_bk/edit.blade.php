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
              <h3 class="card-title">Form Edit Guru BK</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('guru_bk.update', $guru_bk->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="nip">Nip</label>
                  <input type="number" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{$guru_bk->nip}}">
                </div>
                @error('nip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$guru_bk->nama}}">
                </div>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="nummber" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{$guru_bk->no_telp}}">
                  </div>
                  @error('no_telp')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                {{-- <button type="submit" class="btn btn-warning" style="margin-left: 25px">Update</button>
                <a href="" class="btn btn-secondary" style="margin-left: 8px;" data-toggle="modal" data-target="#exampleModal">Back</a> --}}
              <!-- /.card-body -->

              <div class="card-footer" style="background-color: #ffffff;">
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('guru_bk.index') }}" class="btn btn-secondary" style="margin-left: 8px;">Back</a>

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
          <a href="{{ route('guru_bk.index') }}" type="button" class="btn btn-primary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection
