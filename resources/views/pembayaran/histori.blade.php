@extends('dashboard')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Histori Pembayaran</h3>
        <a class="btn btn-success" href="{{ route('pembayaran.export')}}">Export Excel</a>
    
        <table class="table table-striped table-bordered " id="search">
            <thead>
                <tr class="bg-blue-200">
                    <th>No</th>
                    <th>Petugas</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Tahun Dibayar</th>
                    <th>Id Spp</th>
                    <th>Nominal</th>
                    <th>Jumlah Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($views as $p)
                <tr>
                    <td>{{ $p->id}}</td>
                    <td>{{ $p->nama_petugas }}</td>
                    <td>{{ $p->nisn }}</td>
                    <td>{{ $p->nama}}</td>
                    <td>{{ $p->tgl_bayar }}</td>
                    <td>{{ $p->bulan_dibayar }}</td>
                    <td>{{ $p->tahun_dibayar }}</td>
                    <td>{{ $p->id_spp }} </td>
                    <td>{{ $p->nominal }}</td>
                    <td>{{ $p->jumlah_bayar}}</td>
                    
                </tr>
                @endforeach
            </tbody>     
        </table>
    </div>
</div>
{{-- <div class="card">
    <div class="card-header">
        Histori Pembayaran 
    </div>
    <div class="card-body">
        <p class="card-text">
            <b>NISN :</b>{{ $p->nisn }} <br>
            <b>Nama Siswa : </b>{{ $p->nama }} <br>
            <b>Tanggal Bayar : </b>{{ $p->tgl_bayar }} <br>
            <b>Bulan Dibayar : </b>{{ $p->bulan_dibayar }} <br>
            <b>Tahun Dibayar : </b>{{ $p->tahun_dibayar }} <br>
            <b>Nominal : </b>{{ $p->nominal }} <br>
            <b>Jumlah Bayar : </b>{{ $p->jumlah_bayar}} <br>
        </p>
    </div>
</div>  --}}

@endsection