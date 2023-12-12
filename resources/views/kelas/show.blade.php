@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">Form Detail Data Kelas</h2>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card" style="margin-top: 30px;">
                <div class="card-header" style="background-color: blue;">
                <h3 class="card-title" style="color: white;">Detail Data Kelas</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" value="{{ $kelas->kelas }}" name="kelas" disabled>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" style="background-color: white;">
                    <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-secondary">
                    Kembali
                    </a>
                </div>
            </div>
            <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
