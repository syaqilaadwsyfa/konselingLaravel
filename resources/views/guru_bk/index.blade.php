@extends('template.master')

@section('title', '| Guru')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1>Data Guru BK</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Create
                    </button>
                  </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    {{-- <th>Alamat</th> --}}
                    <th>No Telp</th>
                    {{-- <th>Tahun Angkatan</th> --}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($guru_bks as $key => $value)
                    <tr>
                        <td>{{ $key +1 }} </td>
                        <td>{{ $value->nip }} </td>
                        <td>{{ $value->nama }} </td>
                        {{-- <td>{{ $value->alamat }} </td> --}}
                        <td>{{ $value->no_telp }} </td>
                        {{-- <td>{{ $value->tahun_angkatan }} </td> --}}
                        <td class="d-flex align-items-center" style="gap: 10px">
                            <a href="{{ route('guru_bk.show', $value->id) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('guru_bk.edit', $value->id) }}" class="btn btn-sm btn-warning" style="margin-left: 8px;">Edit</a>
                            <form action="{{ route('guru_bk.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 8px; margin-top: 15px;">
                                    {{-- <i class="nav-icon fas fa-trash"></i> --}}
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              {{-- </div> --}}
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Guru BK</h5>
            </div>
            <div class="modal-body">
              <p>Anda yakin akan menghapus Data?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              {{-- <form action="{{ route('guru_bk.destroy', $value->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form> --}}
            </div>
          </div>
        </div>
    </div>
@endsection
@push('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
{{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}

<script>
$(function () {
    $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
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

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Form Add Guru BK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Create -->
                <form action="{{ route('guru_bk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Enter NIP Anda">
                    </div>
                    @error('nip')
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
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Enter Nomor Telepon Anda">
                    </div>
                    @error('no_telp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                  {{-- </div> --}}
              </div>
          </div>
    </div>
</form>
                <!-- Akhir Form Create -->

                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
            </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Akhir Modal -->

<!-- Script JavaScript untuk menangani pengiriman formulir -->
<script>
    function submitForm() {
        document.getElementById('createForm').submit();
    }
</script>

