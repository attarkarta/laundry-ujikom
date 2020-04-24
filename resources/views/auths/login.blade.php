<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dekiru Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/tampilan/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('/assets/images/logo.png')}}">

</head>


<!-- navbar -->
<header>
<div class="header-area ">
  <div id="sticky-header" class="main-header-area">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-xl-3 col-lg-2">
                  <div class="logo">
                      <a href="/dashboard">
                          <img src="{{asset('/assets/images/logo-font.png')}}" alt="Dekiru" width=55%>
                      </a>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-7">
                  
              </div>
              <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                  <div class="Appointment">
                          <a href="/" class="genric-btn success-border circle">Kembali</a>
                  </div>
              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
  <div class="row justify-content-md-center">
  <div class="col-5">
    <div class="container">
      <h1 align="center">Login</h1>
      <p align="center"><font color="gray" >Silahkan Login terlebih dahulu!</font></p>
      <form action='/postlogin' method='POST'>
        {{csrf_field()}}
      <div class="form-group">
        <label for="username">Username</label>
        <input name="username" type="username" class="form-control" id="username" placeholder="Masukan Username Anda" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Masukan Password Anda" required>
      </div>
        <div align="center">
          <button type="submit" class="genric-btn success circle arrow e-large">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>