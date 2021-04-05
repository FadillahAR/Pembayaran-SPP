@extends('dashboard')

@section('content')
<div class="card">
    <div class="card-body">
  
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2 style="color:#19d3da">Aplikasi SPP Pembayaran</h2>
                </div>

                <div class="float-right">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create1">Tambah Siswa</button>
                </div><br>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="create1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('siswa.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>NISN:</strong>
                                        <input type="number" name="nisn" class="form-control" placeholder="NISN">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>NIS:</strong>
                                        <input type="number" name="nis" class="form-control" placeholder="NIS">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama:</strong>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Id Kelas:</strong>
                                        <select name="id_kelas" id="" class="form-control">
                                            <option disabled selected></option>
                                            @foreach ($kelas as $k)
                                            <option value="{{$k->id}}">{{$k->nama_kelas}}</option>                   
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Alamat:</strong>
                                        <textarea class="form-control" name="alamat" id="" cols="10" rows="3"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>No Hp:</strong>
                                        <input type="number" class="form-control" name="no_telp">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                    <div class="form-group">
                                        <strong>Id Spp:</strong>
                                        <select name="id_spp" id="" class="form-control">
                                            <option disabled selected></option>
                                            @foreach ($spps as $s)
                                            <option value="{{$s->id}}"><s>Tahun : </s>{{ substr($s->tahun,0,4)}}</option>                   
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                    <div class="form-group">
                                        <strong>Username:</strong>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        
                        </form>                  
                    </div>
                    
                    </div>
                </div>
            </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
  
        <table class="table table-striped table-bordered" id="search">
            <thead>
                <tr class="bg-blue-200">
                    <th>No</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Id Kelas</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Id Spp</th>
                    <th width="280px">Action</th>
                </tr>
            <tbody>
            @foreach ($views as $siswa)
                <tr>
                    <td>{{ $siswa->nisn}}</td>
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nama_kelas }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->no_telp }}</td>
                    <td>
                        <small>Tahun : </small> {{ substr($siswa->tahun,0,4) }}
                        <br>
                        <small>Nominal : </small> {{ $siswa->nominal}}
                    </td>
                    <td>
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('siswa.destroy',$siswa->nisn) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary"  href="{{ route('siswa.edit',$siswa->nisn) }}">Edit</a>  
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>     
        </table>
    </div>
</div>
@endsection