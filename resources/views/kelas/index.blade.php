@extends('template.master')
@section('title', '| Kelas')

@push('css')
<link rel="stylesheet" href="{{ asset('adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
<h2 class="fw-semibold text-center py-3">Data Kelas</h2>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col text-right">
              <h3 class="card-title">Form Input Data Kelas</h3>
              <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus" style="color: #ffffff;"></i>Tambah Data Kelas
              </a>
            </div>
          <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($kelas as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->nama_kelas }}</td>
                      <td class="d-flex" style="gap: 10px">
                        <form action="{{ route('kelas.destroy', $value->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">
                              Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
@endsection

@push('script')
  <!-- DataTables  & Plugins -->
<script src="{{ asset('adminLte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $('#dataTables').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
