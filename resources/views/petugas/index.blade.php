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
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create1">Tambah Petugas</button>
                </div><br>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="create1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('petugas.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Petugas:</strong>
                                        <input type="text" name="nama_petugas" class="form-control" placeholder="Nama petugas">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Username:</strong>
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Level:</strong>
                                        <select name="level" class="form-control">
                                            <option value="ADMIN">Admin</option>
                                            <option value="PETUGAS">Petugas</option>
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
        
  
        <table class="table table-striped table-bordered " id="search">
            <thead>
                <tr class="bg-blue-200">
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th width="280px">Action</jth>
                </tr>
            </thead>
            <tbody>
            @foreach ($petugas as $p)
                <tr>
                    <td>{{ $p->id}}</td>
                    <td>{{ $p->nama_petugas }}</td>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->password }}</td>
                    <td>{{ $p->level }}</td>
                    <td>
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('petugas.destroy',$p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary"  href="{{ route('petugas.edit',$p->id) }}">Edit</a>  
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