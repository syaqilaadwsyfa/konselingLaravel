@extends('template.master')
@section('title', '| Konseling')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
{{-- header start --}}
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1 style="font-size: 37px;">Data Bimbingan Konseling</h1>
            </div>
        </div>
    </div>
</section>
{{-- header end --}}

{{-- content start --}}
<section class="content">
    <div class="container-fluid">
        <div class="row pb-3">
            <div class="col-12">
                <div class="card">
                    @can('isSiswa')
                    <div class="card-header text-right">
                        <a href="{{ route('konseling.create') }}" class="btn btn-success my-2">Konsultasi ke Guru BK</a>
                    </div>
                    @endcan
                    <div class="card-body">
                        <h3 class="text-center mb-2">Jadwal Guru BK</h3>
                        <table class="table table-bordered table-hover mb-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru Bk</th>
                                    <th>Tanggal Konseling</th>
                                    @cannot('isSiswa')
                                        <th>Nama Siswa</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    @endcannot
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konseling as $key => $konseling)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>@forelse ($konseling->guruBk as $guruBk)
                                        {{ $guruBk->nama }}
                                    @empty
                                        lahhh
                                    @endforelse</td>
                                    <td>{{ date_format(new DateTime($konseling->tgl_konseling), 'd/m/Y') }}</td>
                                    @cannot('isSiswa')
                                        <td>@forelse ($konseling->siswa as $siswa)
                                            {{ $siswa->nama }}
                                        @empty
                                            lahhh
                                        @endforelse</td>
                                        <td>{{ $konseling->status }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">Beri Hasil Konsultasi</button>
                                            {{-- modal start --}}
                                            <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="createModalLabel">Beri Hasil Konsultasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="hasil_konseling">Hasil Konseling</label>
                                                                    <textarea name="hasil_konseling" class="form-control @error('hasil_konseling') is-invalid @enderror" id="hasil_konseling"></textarea>
                                                                </div>
                                                                @error('hasil_konseling')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="hidden" name="status" value="selesai">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- modal end --}}
                                        </td>
                                    @endcannot
                                </tr>
                                @endforeach
                                @empty($konseling)
                                    <td colspan="6" class="text-center">Tidak ada jadwal Guru BK</td>
                                @endempty
                            </tbody>
                        </table>
                        @cannot('isSiswa')
                        <h3 class="text-center mt-5 mb-2">Konseling Selesai</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru BK</th>
                                    <th>Tanggal Konseling</th>
                                    <th>Nama Siswa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsulDone as $key => $done)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>@forelse ($done->guruBk as $guruBk)
                                            {{ $guruBk->nama }}
                                        @empty
                                            lahhh
                                        @endforelse</td>
                                        <td>{{ date_format(new DateTime($done->tgl_konseling), 'd/m/Y') }}</td>
                                        <td>@forelse ($done->siswa as $siswa)
                                            {{ $siswa->nama }}
                                        @empty
                                            lahhh
                                        @endforelse</td>
                                        <td>{{ $done->status }}</td>
                                    </tr>
                                @endforeach
                                @empty($done)
                                    <td colspan="5" class="text-center">Belum ada konsultasi yang selesai</td>
                                @endempty
                            </tbody>
                        </table>
                        <h3 class="text-center mt-5 mb-2">Konseling Ditolak</h3>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru BK</th>
                                    <th>Tanggal Konseling</th>
                                    <th>Nama Siswa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsulDecline as $key => $decline)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>@forelse ($decline->guruBk as $guruBk)
                                            {{ $guruBk->nama }}
                                        @empty
                                            lahhh
                                        @endforelse</td>
                                        <td>{{ date_format(new DateTime($decline->tgl_konseling), 'd/m/Y') }}</td>
                                        <td>@forelse ($decline->siswa as $siswa)
                                            {{ $siswa->nama }}
                                        @empty
                                            lahhh
                                        @endforelse</td>
                                        <td>{{ $decline->status }}</td>
                                    </tr>
                                @endforeach
                                @empty($decline)
                                    <td colspan="5" class="text-center">Tidak ada konsultasi yang ditolak</td>
                                @endempty
                            </tbody>
                        </table>
                        @endcannot
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- content end --}}
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
