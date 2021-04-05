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
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#create1">Tambah Spp</button>
                </div><br>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="create1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Spp Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('spp.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tahun:</strong>
                                        <input type="number" name="tahun" class="form-control" placeholder="Tahun">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nominal:</strong>
                                        <input class="form-control" type="number" name="nominal" placeholder="Nominal">
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
                    <th>Tahun</th>
                    <th>Nominal</th>
                    <th width="280px">Action</jth>
                </tr>
            </thead>
            <tbody>
            @foreach ($spps as $spp)
                <tr>
                    <td>{{ $spp->id}}</td>
                    <td>{{ $spp->tahun }}</td>
                    <td>{{ $spp->nominal}}</td>
                    <td>
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('spp.destroy',$spp->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary"  href="{{ route('spp.edit',$spp->id) }}">Edit</a>  
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