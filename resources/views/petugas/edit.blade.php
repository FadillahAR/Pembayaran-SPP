@extends('layouts.app')
   
@section('content')
<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit petugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('petugas.index') }}">Back</a>
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
  
    <form action="{{ route('petugas.update',$petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Nama petugas:</strong>
                     <input type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}" class="form-control" placeholder="Name">
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" value="{{ $petugas->username }}" class="form-control" placeholder="username">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" value="{{ $petugas->password }}" class="form-control" placeholder="password">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                 <div class="form-group">
                    <strong>Level:</strong>
                    <select name="level" class="form-control">
                        <option value="ADMIN">Admin</option>
                        <option value="PETUGAS">Petugas</option>
                    <select>
                </div>
            </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    </div>
</div>
@endsection
