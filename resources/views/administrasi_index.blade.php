@extends('layouts.sbadmin2')
@include('flash::message')
@section('content')
<style>
    dd, dt {
        margin-bottom: 0;
    }

    dl {
        margin-bottom: 0;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .data-pasien dt {
        float: left;
        clear: left;
        width: 50%;
        font-weight: bold;
    }

    .data-pasien dd {
        float: left;
        width: 50%;
        margin-left: 0;
    }
</style>
<div class="card">
    <div class="card-header">
        {{ $judul }}
    </div>
    <div class="card-body">
        @if (auth()->user()->role != 'pasien' && auth()->user()->role != 'dokter')
            <a href="{{ route('administrasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Antrian</th>
                        <th width="38%">Data Pasien</th>
                        <th>Keluhan</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        @if (auth()->user()->role != 'pasien')
                            <th width="20%">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administrasi as $item)
                        <tr>
                            <td>{{ $item->kode_administrasi }}</td>
                            <td>
                                <dl class="data-pasien">
                                    <dt>Nama Pasien</dt>
                                    <dd>: {{ $item->pasien->nama_pasien }}</dd>

                                    <dt>Nomor HP</dt>
                                    <dd>: {{ $item->pasien->nomor_hp }}</dd>

                                    <dt>Tujuan Poli</dt>
                                    <dd>: {{ $item->poli }}</dd>

                                    <dt>Dokter</dt>
                                    <dd>: {{ $item->dokter->nama_dokter }}</dd>
                                </dl>
                            </td>
                            <td>
                                <div><strong>Keluhan</strong>: {{ $item->keluhan }}</div>
                                <div><strong>Diagnosa:</strong> {{ $item->diagnosis }}</div>
                            </td>
                            <td>Rp. {{ number_format($item->biaya, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-pill badge-{{ $item->status == 'baru' ? 'primary' : 'success' }}" style="font-size: 100% !important;">{{ $item->status }}</span>
                            </td>
                            @if (auth()->user()->role != 'pasien')
                                <td>
                                    <a href="/administrasi/{{ $item->id }}/edit" class="btn btn-primary">Diagnosis</a>
                                    @if (auth()->user()->role == 'admin')
                                        <form action="{{ route('administrasi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection