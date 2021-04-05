<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spp Pembayaran</title>
    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    {{-- DataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  
</head>
<body>
    <div class="card">
        <div class="card-body">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Home</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @if (auth()->user()->level=='ADMIN')
                        <li class="nav-item">
                            <a class="nav-link active"href="/spp">SPP</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="/kelas">Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/petugas">Petugas</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link active" href="/siswa">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pembayaran">Pembayaran</a>
                        </li>
                        @elseif(auth()->user()->level=='PETUGAS')
                        <li class="nav-item">
                            <a class="nav-link active" href="/pembayaran">Pembayaran</a>
                        </li>    
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" href="/histori">Histori</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav position-absolute top-15 end-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{auth()->user()->nama_petugas}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}"onclick="return confirm('Are you sure?');" >Logout</a>
                            </ul>
                        </li>                        
                    </ul>
                                              
                  </div>
             
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    {{-- Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    {{-- Datatables --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- Jquery --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script>

        function getData() {
            var nisn = $('#nisn').val();
            console.log(nisn);

            $.ajax({
                url: "{{url('pembayaranGet/')}}" + '/' + nisn,
                type: "GET",

                success: function (data) {
                    console.log(data['bulan'])
                    $('#nominal').val(data['harga'])
                    $('#bulan').val(data['bulan'])
                    $('#tahun').val(data['tahun'])
                }
            })
        }

       $(document).ready( function () {
         $('#search').DataTable();
         $('#nisn').select2();
        } );
    </script>
</body>
     
</html>

