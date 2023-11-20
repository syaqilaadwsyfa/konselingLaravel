@extends('template.master')

@section('title', 'GuruBK')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Input Data Guru BK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('guru_bk.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="number" id="nip" class="form-control" name="nip" placeholder="Input NIP Guru BK">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Input Nama Guru BK">
                    <label for="exampleInputEmail1">No Telepon</label>
                    <input type="number" class="form-control" name="no_telp" placeholder="Input No Telp Guru BK">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" style="background-color: #ffffff">
                  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary" onclick="reset()" style="margin-left: 8px;">Reset</button>
                </div>
              </form>
            </div>
        </div>
    </div>
            {{-- <script>
              let kodeAnggota = document.getElementById('kode_anggota')

              function reset() {
                kodeAnggota.clear()
              }
            </script> --}}
@endsection
