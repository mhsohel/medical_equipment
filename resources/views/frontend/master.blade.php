
<!DOCTYPE html>
<!--
   Template Name: Multifarious - Responsive HTML Template
   Version: 1.0.0
   Author: Kamleshyadav
   Website:
   Purchase:
   -->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
   <![endif]-->
<!--[if IE 9]>
   <html lang="en" class="ie9 no-js">
      <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--<![endif]-->
<!-- Begin Head -->


<!-- Mirrored from kamleshyadav.com/html/multifarious/html/courier-service/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Oct 2022 13:40:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/comman.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="shortcut icon" type="image/ico" href="{{asset('frontend')}}/images/index/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Multifarious Services - Responsive HTML Template</title>

</head>

<body>
    <!-- Preloader Box -->
    <div class="preloader_wrapper preloader_active preloader_open">
        <div class="preloader_holder">
            <div class="preloader d-flex justify-content-center align-items-center h-100">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!--===Header Start===-->
    <div class="cs_top_header_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="cs_top_header_info">
                        <div class="cs_top_header_info_call">
                            <p><img src="{{asset('frontend')}}/images/index/call.svg" class="img-fluid" alt="images">Call Us Now - <span>{{ $about->contact }}</span></p>
                        </div>
                        <div class="cs_top_header_info_mail">
                            <p><img src="{{asset('frontend')}}/images/index/envelope.svg" class="img-fluid" alt="images">Email Us Now - <span>{{ $about->email }}</span> </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="cs_top_header_info_btn">
                        <a href="javascript:void(0);">Register free </a> | <a href="javascript:void(0);" class="cs_signin"> Sign in</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!--===Main Header Start===-->
    <div class="cs_header_wrapper fixed_header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-5">
                    <div class="cs_logo">
                        <a href="{{ route('index') }}}"> <img src="{{ asset('images/backend') }}/{{ $about->site_logo }}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-7">
                    <div class="cs_main_menu main_menu_parent">
                        <!-- Header Menus -->
                        <div class="cs_nav_items main_menu_wrapper text-right">
                            <ul class="cs_menu_list">

                                @foreach ($menus as $menu)

                                <li class="@if(Request::is('/')) active @endif">
                                    <a href="{{ $menu->slug }}">{{ $menu->name }}</a>
                                </li>
                                @endforeach

                                {{-- <li class="active">
                                    <a href="index.html">Home</a>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li class="has_submenu">
                                    <a href="javascript:void(0);">Blog</a>
                                    <ul class="sub_menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="single-blog.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li> --}}
                            </ul>
                        </div>
                        <div class="cs_search_wrap menu_btn_wrap">
                            <ul class="display_flex">
                                <li class="cs_header_btn cs_main_btn"><a href="javascript:void(0);" class="cs_startbtn">Start Shipping</a></li>
                                <li>
                                    <a href="javascript:void(0);" class="menu_btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@yield('content')




     <!--===================Contact Section==================-->
     <div class="cs_contact_wrapper wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="cs_contact_box" data-wow-duration="1.3s" style="visibility: visible; animation-duration: 0.8s; animation-name: slideInLeft;">
                        <img src="{{asset('frontend')}}/images/index/time.svg" class="img-fluid" alt="images">
                        <h1>Opening Hours</h1>
                        <p>Monday - Friday 09.00 - 18.00<br> Saturday 09.00 - 14.00
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="cs_contact_box" data-wow-duration="1.3s" style="visibility: visible; animation-duration: 0.8s; animation-name: slideInDown;">
                        <img src="{{asset('frontend')}}/images/index/SVG/Footer/phone.svg" class="img-fluid" alt="images">
                        <h1>Call Us Anytime</h1>
                        <p>{{ $about->contact2 }}<br> {{ $about->contact3 }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="cs_contact_box" data-wow-duration="1.3s" style="visibility: visible; animation-duration: 0.8s; animation-name: slideInRight;">
                        <img src="{{asset('frontend')}}/images/index/email.svg" class="img-fluid" alt="images">
                        <h1>Mail Us</h1>
                        <p>{{ $about->email2 }}<br> {{ $about->email3 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===================Footer Section==================-->
    <div class="cs_footer_wrapper">
        <div class="container">
            <div class="row" data-wow-duration="1.3s" style="visibility: visible; animation-duration: 0.8s; animation-name: slideInDown;">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="cs_footer_section1">
                        <div class="cs_footer_logo">
                            <a href="index.html"><img src="{{asset('frontend')}}/images/index/logo.png" class="img-fluid" alt="images"> Multifarious</a>
                        </div>
                        <p>{{ $about->slogan }}</p>
                        <div class="cs_footer_icon">
                            <h5>Follow Us</h5>
                            <ul>
                                <li><a href="{{ $about->facebook }}"><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a href="{{ $about->twiter }}"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{ $about->google_plus }}"><i class="fa-brands fa-square-google-plus"></i></a></li>
                                <li><a href="{{ $about->google }}"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="cs_footer_section2">
                        <h5>Courier Service</h5>
                        <ul>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Standard</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Express</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;International</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Ware Housing</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Overnight</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Pallet</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="cs_footer_section3">
                        <h5>Policies</h5>
                        <ul>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Privacy Policy</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Terms of Use</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Mobile User</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Agreement</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Ad Choice</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="cs_footer_section4">
                        <h5>Information</h5>
                        <ul>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Express</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Material</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Furniture</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Vehicle</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Commodity</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Courier</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="cs_footer_section5">
                        <h5>Company</h5>
                        <ul>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;About</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Why Choose Us</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Contact Us</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Support</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Career</a></li>
                            <li> <a href="javascript:void(0);">- &nbsp;&nbsp;Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs_copyright">
            <p>Copyright &copy; 2021 <a href="javascript:void(0);">{{ $about->copyright }}</a>. All Right Reserved.</p>
        </div>
    </div>
    <!-- GO To Top -->
    <a href="javascript:void(0);" id="scroll"><span class="fa fa-angle-double-up"></span></a>
    <!-- Script Start -->

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/smoothScroll.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>



</body>



</html>
