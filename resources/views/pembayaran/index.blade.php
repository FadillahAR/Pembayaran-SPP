@extends('dashboard')

@section('content')
<div class="card">
    <div class="card-body shadow p-3 mb-5 bg-body rounded">
  
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2 style="color:#19d3da">Aplikasi SPP Pembayaran</h2>
                </div>

                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('pembayaran.create') }}">Tambah Pembayaran</a>
                </div><br>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="create1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
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

        {{-- Show Modal --}}
        @foreach ($views as $p)
        <div class="modal fade" id="show" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="exampleModalLabel">Kwitansi</h5>
                    </center>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <b>NISN :</b>{{ $p->nisn }} <br>
                        <b>Nama Siswa : </b>{{ $p->nama }} <br>
                        <b>Tanggal Bayar : </b>{{ $p->tgl_bayar }} <br>
                        <b>Bulan Dibayar : </b>{{ $p->bulan_dibayar }} <br>
                        <b>Tahun Dibayar : </b>{{ $p->tahun_dibayar }} <br>
                        <b>Nominal : </b>{{ $p->nominal }} <br>
                        <b>Jumlah Bayar : </b>{{ $p->jumlah_bayar}} <br>  
                    </center>             
                </div>
                
            </div>
        </div>
    </div>
        @endforeach        

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
  
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
                    <th width="280px">Action</jth>
                </tr>
            </thead>
            @foreach ($views as $p)
            <tbody>
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
                    <td>
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('pembayaran.destroy',$p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info" href="{{ route('pembayaran.show', $p->id)}}">Show</a>
                            @if (auth()->user()->level=='ADMIN')
                            {{-- <a class="btn btn-success" href="{{ route('pembayaran.create', $p->id)}}">Create</a> --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>     
        </table>
    </div>
</div>
@endsection