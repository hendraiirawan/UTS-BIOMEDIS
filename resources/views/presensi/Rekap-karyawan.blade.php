@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">Rekap Presensi Karyawan</div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                         <tr>
                                        <th>pegawai</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                        <th>Jumlah Jam Kerja</th>
                                    </tr>
                </thead>
                <tbody>
                    @foreach ($presensi as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->tgl }}</td>
                            <td>{{ $item->jammasuk }}</td>
                            <td>{{ $item->jamkeluar }}</td>
                            <td>{{ $item->jamkerja }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
