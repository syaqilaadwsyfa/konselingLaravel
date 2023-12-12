@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">Form Input Data Kelas</h2>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kelas</h3>
              </div>
              <!-- /.card-header -->
            <!-- form start -->
                <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" placeholder="Enter Nama Kelas">
                    </div>
                    @error('kelas')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer" style="background-color: white;">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                <button type="reset" class="btn btn-sm alert-danger">Reset</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-secondary">
                    Kembali
                </a>
                </div>
            </form>
            </div>
            </section>
        </div>
@endsection
