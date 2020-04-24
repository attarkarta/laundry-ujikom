@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <!-- Selamat Datang Admin! -->
        <div class="welcome_docmed_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome_thumb">
                            <div class="thumb_1">
                                <img src="{{asset('assets/tampilan/img/about/1.jpg')}}" alt="">
                            </div>
                            <div class="thumb_2">
                                <img src="{{asset('assets/tampilan/img/about/2.jpg')}}" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="welcome_docmed_info">
                            <h2>Selamat datang di Dekiru, {{auth()->user()->nama}} !</h2>
                            <h3>Ngelaundry ? <br>
                                    Lebih Praktis Menghemat Waktu loh!</h3>
                            <p>Mungkin kamu merasa gak punya waktu nyuci sendiri ? Atau mungkin kamu merasa ribet alias gak praktis ?
Nah, sekarang kamu udah gak perlu repot-repot. Nikmati berbagai layanan terbaik jasa laundry dari kami dengan harga yang cukup terjangkau!</p>
                            <ul>
                                <li> <i class="flaticon-right"></i> Service Berkualitas. </li>
                                <li> <i class="flaticon-right"></i> Layanan Terlengkap.</li>
                                <li> <i class="flaticon-right"></i> Mudah dan Praktis. </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- welcome_docmed_area_end -->
    </div>
</div>

<!-- footer start -->
<footer class="footer">
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl">
                            <p class="copy_right text-center">
Uji Kompetensi SMKN 2 Sukabumi | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.instagram.com/attarkarta/" target="_blank">Ath Thariq Kartanegara</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<!-- footer end  -->


@endsection