@extends('layouts.app')
   
@section('content')
<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit spp</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('spp.index') }}">Back</a>
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
  
    <form action="{{ route('spp.update',$spp->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Tahun:</strong>
                     <input type="number" name="tahun" value="{{ $spp->tahun }}" class="form-control" placeholder="Name">
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                    <strong>Nominal:</strong>
                    <input class="form-control" type="number" name="nominal" value="{{ $spp->nominal}}">
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
