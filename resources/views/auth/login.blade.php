<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Spp Pembayaran</title>
  {{-- Bootsrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>
  <center>  
     <div class="card mt-4" style="width: 60rem;">
      
        <div class="card-header">
          <b>LOGIN</b>
        </div>

        <div class="card-body" >
          <form action="{{ route('postlogin') }}" method="POST">
            @csrf
            <div class="col-xs-2 col-sm-2 col-md-2 mb-2">
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 mb-2">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </form>
        </div>

     </div>
  </center>
  
</body>
</html>