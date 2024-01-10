@extends('template.master')
@section('title', '| Konseling')

@section('content')
<div class="container-fluid">
    <h2 class="fw-semibold text-center py-3">Konsultasi ke Guru BK</h2>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Isi Form Berikut</h3>
        </div>
        <form action="{{ route('konseling.store') }}" method="post">
            @csrf
            <div class="card-body">
                <input type="hidden" name="siswa_id" value="@forelse (Auth::user()->siswa as $siswa)
                    {{ $siswa->id }}
                @empty
                    lahhh
                @endforelse">
                <div class="mb-2">
                    <label for="guruBk_id">Pilih Guru BK</label>
                    <select name="guruBk_id" id="guruBk_id" class="form-control @error('guruBk_id') is-invalid @enderror">
                        <option disabled selected>--Pilih Salah Satu--</option>
                        @foreach ($guru_bk as $guruBk)
                            <option value="{{ $guruBk->id }}">{{ $guruBk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="tgl_konseling">Tanggal Konseling</label>
                    <input type="date" id="tgl_konseling" name="tgl_konseling" class="form-control @error('tgl_konseling') is-invalid @enderror" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                </div>
                <div class="mb-4">
                    <label for="keluhan">Mengapa Anda ingin berkonsultasi</label>
                    <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
                </div>
                <input type="hidden" name="hasil_konseling" value="">
                <input type="hidden" name="status" value="pending">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#modal">Batal</button>
                        {{-- modal start --}}
                        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel"><img src="{{ asset('adminlte/dist/img/rpl.jpg') }}" alt="..." style="width: 40px; margin-right: 7px">B-Kita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin membatalkan pengajuan konsultasi ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('konseling.index') }}" class="btn btn-secondary">Ya</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal end --}}
                        <button type="submit" class="btn btn-primary">Ajukan Konseling</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
