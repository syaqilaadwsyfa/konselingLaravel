@extends('template.master')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
@endpush

@section('title', 'Siswa')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1>Data Siswa</h1>
          </div>
          {{-- <div class="col-sm-12 text-center">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> --}}
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
                      {{-- <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">
                          <i class="fas fa-plus"></i> Add Siswa
                      </a> --}}
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
                    <th>NIS</th>
                    <th>Nama</th>
                    {{-- <th>Alamat</th> --}}
                    <th>Kelas</th>
                    {{-- <th>Tahun Angkatan</th> --}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($siswas as $key => $value)
                    <tr>
                        <td>{{ $key +1 }} </td>
                        <td>{{ $value->nis }} </td>
                        <td>{{ $value->nama }} </td>
                        {{-- <td>{{ $value->alamat }} </td> --}}
                        <td>{{ $value->kelas }} </td>
                        {{-- <td>{{ $value->tahun_angkatan }} </td> --}}
                            <td class="d-flex" style="gap: 10px">
                            <a href="{{ route('siswa.show', $value->id) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('siswa.edit', $value->id) }}" class="btn btn-sm btn-warning" style="margin-left: 8px;">Edit</a>
                            <form action="{{ route('siswa.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 8px;">
                                    {{-- <i class="nav-icon fas fa-trash"></i> --}}
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
    </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Siswa</h5>
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


{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">add siswa</button> --}}

{{-- <div class="modal fade" id="modalTambahSiswa" tabindex="-1" aria-labelledby="modalTambahSiswa" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahSiswa">Add Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.store') }}" method="post">
            @csrf
            <form action="" method=" ">
          <div class="form-group">
            <label for="">Siswa</label>
            <input type="text" class="form-control" id="addNamaSiswa"
                aria-descridby="emailHelp">
            </div>
          </div> --}}

          <!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Form Add Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Create -->
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Isi formulir create di sini -->
                    {{-- <div class="card-body"> --}}
                        {{-- <div class="form-group">
                          <label for="judul">Judul</label>
                          <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Enter Judul Anda">
                        </div>
                        @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label for="genre">Genre</label>
                          <input type="Number" name="genre" class="form-control" id="genre" placeholder="Enter Genre Anda">
                          <select name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror">
                              <option disabled selected>--Pilih Salah Satu--</option>
                                @forelse ( $genres as $value )
                                  <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                @empty
                                <option disabled>--Data Masih Kosong--</option>
                                @endforelse
                          </select>
                        </div>
                        @error('genre')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
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
                          <label for="alamat">Alamat</label>
                          <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror" placeholder="Enter alamat Anda"></textarea>
                        </div>
                        @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label>Kelas</label>
                          <select type="text" name="kelas" class="form-control">
                              <option disabled selected>Pilih Kelas</option>
                              <option value="X RPL 1">X RPL 1</option>
                              <option value="X RPL 2">X RPL 2</option>
                              <option value="XI RPL 1">XI RPL 1</option>
                              <option value="XI RPL 2">XI RPL 2</option>
                              <option value="XII RPL 1">XII RPL 1</option>
                              <option value="XII RPL 2">XII RPL 2</option>
                              <option value="X TKJ 1">X TKJ 1</option>
                              <option value="X TKJ 2">X TKJ 2</option>
                              <option value="XI TKJ 1">XI TKJ 1</option>
                              <option value="XI TKJ 2">XI TKJ 2</option>
                              <option value="XII TKJ 1">XII TKJ 1</option>
                              <option value="XII TKJ 2">XII TKJ 2</option>
                              <option value="X DPIB 1">X DPIB 1</option>
                              <option value="X DPIB 2">X DPIB 2</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" placeholder="Enter Kelas Anda">
                        </div> --}}
                        {{-- @error('kelas')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                        <div class="form-group">
                          <label for="tgl_lahir">Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Enter Tanggal Lahir Anda">
                        </div>
                        @error('tgl_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <select type="text" name="jenis_kelamin" class="form-control">
                              <option disabled selected>Pilih Jenis Kelamin</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_telp_ortu">No Telepon Orangtua</label>
                            <input type="number" name="no_telp_ortu" class="form-control @error('no_telp_ortu') is-invalid @enderror" id="no_telp_ortu" placeholder="Enter No Telp Orangtua Anda">
                          </div>
                          @error('no_telp_ortu')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        {{-- @error('jenis_kelamin')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                        <div class="form-group">
                          <label for="agama">Agama</label>
                          <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Enter Agama Anda">
                        </div>
                        @error('agama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label for="tahun_angkatan">Tahun Angkatan</label>
                          <input type="text" name="tahun_angkatan" class="form-control @error('tahun_angkatan') is-invalid @enderror" id="tahun_angkatan" placeholder="Enter Tahun Angkatan Anda">
                        </div>
                        @error('tahun_angkatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{-- <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="" class="btn btn-secondary">Kembali</a> --}}

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

