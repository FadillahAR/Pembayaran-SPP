@extends('dashboard')
   
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create Pembayaran</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('pembayaran.index') }}">Back</a>
                </div>
            </div>
        </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Petugas</strong>
                    <select name="id_petugas" id="" class="form-control" readonly>
                    <option value="{{auth()->user()->id}}" selected>{{auth()->user()->nama_petugas}}</option>
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Siswa :</strong>
                    <select onchange="getData()" name="nisn" class="form-control" id="nisn" >
                        <option value="" >--Pilih Siswa--</option>
                        @foreach ($siswa as $s)
                        <option value="{{$s->nisn}}"><small>NISN : </small>{{$s->nisn}} <small> Nama : </small>{{$s->nama}}</option>
                        @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                     <strong>Nominal:</strong>
                    <input type="number" name="nominal" id="nominal" class="form-control" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Terakhir dibayar:</strong>
                    <input type="text" name="bulan" id="bulan" class="form-control" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Terakhir dibayar:</strong>
                    <input type="number" name="tahun" id="tahun" class="form-control" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Bayar:</strong>
                    <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>                  
        
        
    
    </div>
</div>
    
</div>
</div>
@endsection
