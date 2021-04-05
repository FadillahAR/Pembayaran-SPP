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
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create1">Tambah Kelas</button>
                </div><br>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="create1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kelas.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Kelas:</strong>
                                        <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>kompetensi keahlian:</strong>
                                        <select name="kompetensi_keahlian" class="form-control" >
                                            <option readonly></option>
                                            <option value="Rekayasa Perangkat Lunak">RPL</option>
                                        </select>
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

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
  
        <table class="table table-striped table-bordered" id="search">
            <thead>
                <tr class="bg-blue-200">
                    <th>No</th>
                    <th>Nama kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th width="280px">Action</jth>
                </tr>
            </thead>
            <tbody>
            @foreach ($kelas as $k)
                <tr>
                    <td>{{ $k->id}}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->kompetensi_keahlian }}</td>
                    <td>
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('kelas.destroy',$k->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary"  href="{{ route('kelas.edit',$k->id) }}">Edit</a>  
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