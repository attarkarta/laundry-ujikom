<!-- Navbar Admin -->
@if(auth()->user()->role == 'admin')
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
                  <div class="main-menu  d-none d-lg-block">
                      <nav>
                          <ul id="navigation">

                              <li><a href="#">Data<i class="ti-angle-down"></i></a>
                                  <ul class="submenu">
                                      <li><a href="/member">Data Member</a></li>
                                      <li><a href="/paket">Data Paket</a></li>
                                      <li><a href="/kasir">Data Kasir</a></li>
                                      <li><a href="/owner">Data Owner</a></li>
                                  </ul>
                              </li> 
                              <li><a href="/pilihpaket">Pilih Paket</a></li>
                              <li><a href="/keranjang">Keranjang</a></li>
                              <li><a href="/transaksi">Transaksi</a></li>
                              <li><a href="/riwayat">Riwayat</a></li>
                          </ul>
                      </nav>
                  </div>
              </div>
                <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                  <div class="Appointment">
                    <a href="/logout" class="genric-btn danger-border circle radius">Log Out</a> 
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
@endif

<!-- Navbar Superadmin -->
@if(auth()->user()->role == 'superadmin')
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
                <div class="main-menu  d-none d-lg-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="/admin">Data Admin</a></li>
                            <li><a href="/member">Data Member</a></li>
                            <li><a href="/outlet">Outlet</a></li>
                            <li><a href="/kasir">Data Kasir</a></li>
                            <li><a href="/owner">Data Owner</a></li>
                        </ul>
                    </nav>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                  <div class="Appointment">
                    <a href="/logout" class="genric-btn danger-border circle radius">Log Out</a> 
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </header>
@endif

<!-- Navbar Kasir -->
@if(auth()->user()->role == 'kasir')
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
                  <div class="main-menu  d-none d-lg-block">
                      <nav>
                          <ul id="navigation">
                              <li><a href="/member">Data Member</a></li>
                              <li><a href="/pilihpaket">Pilih Paket</a></li>
                              <li><a href="/keranjang">Keranjang</a></li>
                              <li><a href="/transaksi">Transaksi</a></li>
                              <li><a href="/riwayat">Riwayat</a></li>
                          </ul>
                      </nav>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                  <div class="Appointment">
                    <a href="/logout" class="genric-btn danger-border circle radius">Log Out</a> 
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </header>
  @endif

  <!-- Navbar Owner -->
@if(auth()->user()->role == 'owner')
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
                  <div class="main-menu  d-none d-lg-block">
                      <nav>
                          <ul id="navigation">
                              <li><a href="/dashboard">Home</a></li>
                              <li><a href="/transaksi">Data Transaksi</a></li>
                          </ul>
                      </nav>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                  <div class="Appointment">
                    <a href="/logout" class="genric-btn danger-border circle radius">Log Out</a> 
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
  @endif

</nav>