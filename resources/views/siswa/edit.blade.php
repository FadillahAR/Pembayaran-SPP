@extends('layouts.app')
   
@section('content')
<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('siswa.index') }}">Back</a>
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
  
    <form action="{{ route('siswa.update',$siswa->nisn) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>NIS:</strong>
                     <input type="number" name="nis" value="{{ $siswa->nis }}" class="form-control" placeholder="NIS">
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Id Kelas:</strong>
                    <select name="id_kelas" id="" class="form-control">
                        @foreach ($kelas as $k)
                        <option value="{{$k->id}}" {{ $k->id_kelas == $siswa->id_kelas ? 'selected' : ''}}>{{$k->nama_kelas}}</option>                   
                        @endforeach
                    </select>
                </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea name="alamat" id="" class="form-control" cols="3" rows="3">{{ $siswa->alamat }}</textarea>
                </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                 <div class="form-group">
                    <strong>Nama:</strong>
                    <input class="form-control" type="text" name="nama" value="{{ $siswa->nama}}">
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
