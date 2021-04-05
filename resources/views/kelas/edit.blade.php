@extends('layouts.app')
   
@section('content')
<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Kelas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kelas.index') }}">Back</a>
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
  
    <form action="{{ route('kelas.update',$k->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Nama Kelas:</strong>
                     <input type="text" name="nama_kelas" value="{{ $k->nama_kelas }}" class="form-control" placeholder="Name">
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Kompetensi Keahlian:</strong>
                    <select class="form-control" name="kompetensi_keahlian" id="">
                        <option readonly></option>
                        <option value="RPL" selected>Rekayasa Perangkat Lunak</option>
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
@endsection
