@extends('template.master')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
@endpush

@section('title', 'pelanggaran')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data pelanggaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
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
                      {{-- <a href="{{ route('pelanggaran.create') }}" class="btn btn-sm btn-primary">
                          <i class="fas fa-plus"></i> Add pelanggaran
                      </a> --}}
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                          Tambah pelanggaran
                      </button>
                  </div>
                  </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Pelanggaran</th>
                    <th>Kelas</th>
                    {{-- <th>Catatan</th>
                    <th>Tgl Pelanggaran</th>
                    <th>Tindakan</th> --}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($pelanggarans as $key => $value)
                    <tr>
                        <td>{{ $key +1 }} </td>
                        <td>{{ $value->nis }} </td>
                        <td>{{ $value->nama }} </td>
                        <td>{{ $value->kelas }} </td>
                        <td>{{ $value->pelanggaran }} </td>
                        {{-- <td>{{ $value->catatan }} </td> --}}
                        {{-- <td>{{ $value->tgl_pelanggaran }} </td> --}}
                        {{-- <td>{{ $value->tindakan }} </td> --}}
                        <td class="d-flex" style="gap: 10px">
                            <a href="{{ route('pelanggaran.show', $value->id) }}" class="btn btn-sm btn-info" style="margin-left: 8px;">Detail</a>
                            <a href="{{ route('pelanggaran.edit', $value->id) }}" class="btn btn-sm btn-warning" style="margin-left: 8px;">Edit</a>
                            <form action="{{ route('pelanggaran.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 8px;">Hapus</button>
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
    </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">pelanggaran</h5>
            </div>
            <div class="modal-body">
              <p>Anda yakin akan menghapus Data?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

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
                <h5 class="modal-title" id="createModalLabel">Form Add pelanggaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Create -->
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
                    <label for="nama">Nama</label>
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
                        <input type="text" name="pelanggaran" class="form-control @error('pelanggaran') is-invalid @enderror" id="pelanggaran" placeholder="Enter Pelanggaran pelanggaran">
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
                        <input type="text" name="tindakan" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" placeholder="Enter tindakan pelanggaran">
                     </div>
                     @error('tindakan')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror

                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                </div>
                  </div>
            </div>
        </div>
    </div>
</div>
</form>
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

