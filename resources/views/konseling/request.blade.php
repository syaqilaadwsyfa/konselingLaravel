@extends('template.master')
@section('title', '| Request Konsul')

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
                <h1 style="font-size: 37px;">Request Konsultasi Anda</h1>
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
                    <div class="card-body">
                        <table class="table table-bordered table-hover mb-3">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Konseling</th>
                                    <th>Keluhan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending as $key => $pending)
                                <tr>
                                    {{-- <td>{{ $key }}</td> --}}
                                    @forelse ($pending->siswa as $siswa)
                                    <td>{{ $siswa->nama }}</td>
                                        @forelse ($siswa->kelas as $kelas)
                                            <td>{{ $kelas->nama_kelas }}</td>
                                        @empty
                                            lahhh
                                        @endforelse
                                    @empty
                                        lahhh
                                    @endforelse
                                    <td>{{ date_format(new DateTime($pending->tgl_konseling), 'd/m/Y') }}</td>
                                    <td>{{ $pending->keluhan }}</td>
                                    <td class="d-flex align-items-center">
                                        <button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="modal" data-target="#tolakModal{{ $key }}">Tolak</button>
                                        {{-- modal start --}}
                                        <div class="modal fade" id="tolakModal{{ $key }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolakModalLabel{{ $key }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tolakModal{{ $key }}"><img src="{{ asset('adminlte/dist/img/rpl.jpg') }}" alt="..." style="width: 40px; margin-right: 7px">B-Kita</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menolak konsultasi tersebut?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('req.tolak', ['konseling_id' => $pending->id]) }}" class="btn btn-secondary">Ya</a>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal end --}}
                                        <a href="{{ route('req.terima', ['konseling_id' => $pending->id]) }}" class="btn btn-sm btn-primary">Terima</a>
                                    </td>
                                </tr>
                                @endforeach
                                @empty($key)
                                    <td colspan="100%" class="text-center">Tidak ada request konsultasi kepada Anda</td>
                                @endempty
                            </tbody>
                        </table>
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
