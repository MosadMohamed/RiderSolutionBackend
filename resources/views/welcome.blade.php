<!doctype html>
<html lang="en">

<head>
    <title>Rider Solutions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('website/images/icon.png') }}" type=" image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('website/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('website/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('website/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('website/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style="overflow: hidden;">


    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-xl-2">
                        <img src="{{ asset('website/images/logo.png') }}" class="w-100">
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="#about-section" class="nav-link">About</a></li>
                                <li><a href="#services-section" class="nav-link">Services</a></li>
                                <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                                <li><a href="#blog-section" class="nav-link">Blog</a></li>
                                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                                <li><a href="{{ route('privacy') }}" class="nav-link">Privacy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                        <a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="site-blocks-cover overlay" style="background-image: url('website/images/hero_2.jpg')" data-aos="fade" id="home-section">

            <div class="container">
                <div class="row align-items-center justify-content-center">


                    <div class="col-md-8 mt-lg-5 text-center">
                        <h1 class="text-uppercase" data-aos="fade-up">Welcome</h1>
                        <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Optio soluta eius error.</p>
                        <div data-aos="fade-up" data-aos-delay="100">
                            <a href="#contact-section" class="btn smoothscroll btn-primary mr-2 mb-2">Get In Touch</a>
                        </div>
                    </div>

                </div>
            </div>

            <a href="#about-section" class="mouse smoothscroll">
                <span class="mouse-icon">
                    <span class="mouse-wheel"></span>
                </span>
            </a>
        </div>


        <div class="site-section cta-big-image" id="about-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">About Us</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                        <figure class="circle-bg">
                            <img src="{{ asset('website/images/hero_1.jpg') }}" alt="Image" class="img-fluid">
                        </figure>
                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-4">
                            <h3 class="h3 mb-4 text-black">For the next great business</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo tempora cumque eligendi in nostrum labore
                                omnis quaerat.</p>

                        </div>



                        <div class="mb-4">
                            <ul class="list-unstyled ul-check success">
                                <li>Officia quaerat eaque neque</li>
                                <li>Possimus aut consequuntur incidunt</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipisicing elit</li>
                            </ul>

                        </div>



                    </div>
                </div>
            </div>
        </div>

        <section class="site-section">
            <div class="container">

                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Our Features</h2>
                        <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Minus minima neque tempora reiciendis.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">

                        <div class="owl-carousel slide-one-item-alt">
                            <img src="{{ asset('website/images/slide_1.jpg') }}" alt="Image" class="img-fluid">
                            <img src="{{ asset('website/images/slide_2.jpg') }}" alt="Image" class="img-fluid">
                            <img src="{{ asset('website/images/slide_3.jpg') }}" alt="Image" class="img-fluid">
                            <img src="{{ asset('website/images/slide_4.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="custom-direction">
                            <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
                        </div>

                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">

                        <div class="owl-carousel slide-one-item-alt-text">
                            <div>
                                <h2 class="section-title mb-3">Minimal and Modern Design</h2>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi
                                    voluptas impedit Quo suscipit omnis iste velit maxime.</p>

                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>
                            <div>
                                <h2 class="section-title mb-3">Do things with love</h2>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi
                                    voluptas impedit Quo suscipit omnis iste velit maxime.</p>

                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>
                            <div>
                                <h2 class="section-title mb-3">Take your business online</h2>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi
                                    voluptas impedit Quo suscipit omnis iste velit maxime.</p>

                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>
                            <div>
                                <h2 class="section-title mb-3">4 Our Dedicated Professionals</h2>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi
                                    voluptas impedit Quo suscipit omnis iste velit maxime.</p>

                                <p><a href="#" class="btn btn-primary mr-2 mb-2">Learn More</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



        <section class="site-section border-bottom" id="team-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Our Team</h2>
                        <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Minus minima neque tempora reiciendis.</p>
                    </div>
                </div>
                <div class="row">


                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_5.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Kaiara Spencer</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_6.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Dave Simpson</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_7.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Ben Thompson</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_8.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Kyla Stewart</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_1.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Kaiara Spencer</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_2.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Dave Simpson</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_3.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Ben Thompson</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <figure>
                                <ul class="social">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <img src="{{ asset('website/images/person_4.jpg') }}" alt="Image" class="img-fluid">
                            </figure>
                            <div class="p-3">
                                <h3>Chris Stewart</h3>
                                <span class="position">Product Manager</span>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>

        <section class="site-section" id="portfolio-section">


            <div class="container">

                <div class="row mb-3">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Portfolio</h2>
                    </div>
                </div>

                <div class="row justify-content-center mb-5" data-aos="fade-up">
                    <div id="filters" class="filters text-center button-group col-md-7">
                        <button class="btn btn-primary active" data-filter="*">All</button>
                        <button class="btn btn-primary" data-filter=".web">Web</button>
                        <button class="btn btn-primary" data-filter=".design">Design</button>
                        <button class="btn btn-primary" data-filter=".brand">Brand</button>
                    </div>
                </div>

                <div id="posts" class="row no-gutter">
                    <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_1.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_1.jpg') }}">
                        </a>
                    </div>
                    <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_2.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_2.jpg') }}">
                        </a>
                    </div>

                    <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_3.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_3.jpg') }}">
                        </a>
                    </div>

                    <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">

                        <a href="{{ asset('website/images/img_4.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_4.jpg') }}">
                        </a>

                    </div>

                    <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_5.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_5.jpg') }}">
                        </a>
                    </div>

                    <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_6.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_6.jpg') }}">
                        </a>
                    </div>

                    <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_7.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_7.jpg') }}">
                        </a>
                    </div>

                    <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_8.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_8.jpg') }}">
                        </a>
                    </div>

                    <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_9.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_9.jpg') }}">
                        </a>
                    </div>

                    <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_10.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_10.jpg') }}">
                        </a>
                    </div>

                    <div class="item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_11.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_11.jpg') }}">
                        </a>
                    </div>

                    <div class="item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_12.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_12.jpg') }}">
                        </a>
                    </div>

                    <div class="item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ asset('website/images/img_13.jpg') }}" class="item-wrap fancybox" data-fancybox="gallery2">
                            <span class="icon-search2"></span>
                            <img class="img-fluid" src="{{ asset('website/images/img_13.jpg') }}">
                        </a>
                    </div>

                </div>
            </div>

        </section>


        <section class="site-section border-bottom bg-light" id="services-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Our Services</h2>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4">
                            <div class="unit-4-icon mr-4"><span class="text-primary flaticon-startup"></span></div>
                            <div>
                                <h3>Business Consulting</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi
                                    at.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="unit-4">
                            <div class="unit-4-icon mr-4"><span class="text-primary flaticon-graphic-design"></span></div>
                            <div>
                                <h3>Market Analysis</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi
                                    at.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="unit-4">
                            <div class="unit-4-icon mr-4"><span class="text-primary flaticon-settings"></span></div>
                            <div>
                                <h3>User Monitoring</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi
                                    at.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
                        <div class="unit-4">
                            <div class="unit-4-icon mr-4"><span class="text-primary flaticon-idea"></span></div>
                            <div>
                                <h3>Insurance Consulting</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi
                                    at.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="unit-4">
                            <div class="unit-4-icon mr-4"><span class="text-primary flaticon-smartphone"></span></div>
                            <div>
                                <h3>Financial Investment</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi
                                    at.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="unit-4">
                            <div class="unit-4-icon mr-4"><span class="text-primary flaticon-head"></span></div>
                            <div>
                                <h3>Financial Management</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi
                                    at.</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="site-section testimonial-wrap" id="testimonials-section" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="section-title mb-3">Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="slide-one-item home-slider owl-carousel">
                <div>
                    <div class="testimonial">

                        <blockquote class="mb-5">
                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam
                                quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet
                                dolores excepturi earum unde iusto.&rdquo;</p>
                        </blockquote>

                        <figure class="mb-4 d-flex align-items-center justify-content-center">
                            <div><img src="{{ asset('website/images/person_3.jpg') }}" alt="Image" class="w-50 img-fluid mb-3"></div>
                            <p>John Smith</p>
                        </figure>
                    </div>
                </div>
                <div>
                    <div class="testimonial">

                        <blockquote class="mb-5">
                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam
                                quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet
                                dolores excepturi earum unde iusto.&rdquo;</p>
                        </blockquote>
                        <figure class="mb-4 d-flex align-items-center justify-content-center">
                            <div><img src="{{ asset('website/images/person_2.jpg') }}" alt="Image" class="w-50 img-fluid mb-3"></div>
                            <p>Christine Aguilar</p>
                        </figure>

                    </div>
                </div>

                <div>
                    <div class="testimonial">

                        <blockquote class="mb-5">
                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam
                                quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet
                                dolores excepturi earum unde iusto.&rdquo;</p>
                        </blockquote>
                        <figure class="mb-4 d-flex align-items-center justify-content-center">
                            <div><img src="{{ asset('website/images/person_4.jpg') }}" alt="Image" class="w-50 img-fluid mb-3"></div>
                            <p>Robert Spears</p>
                        </figure>


                    </div>
                </div>

                <div>
                    <div class="testimonial">

                        <blockquote class="mb-5">
                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam
                                quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet
                                dolores excepturi earum unde iusto.&rdquo;</p>
                        </blockquote>
                        <figure class="mb-4 d-flex align-items-center justify-content-center">
                            <div><img src="{{ asset('website/images/person_4.jpg') }}" alt="Image" class="w-50 img-fluid mb-3"></div>
                            <p>Bruce Rogers</p>
                        </figure>

                    </div>
                </div>

            </div>
        </section>

        <section class="site-section bg-light" id="pricing-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h2 class="section-title mb-3">Pricing</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="">
                        <div class="pricing">
                            <h3 class="text-center text-black">Basic</h3>
                            <div class="price text-center mb-4 ">
                                <span><span>$47</span> / year</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <li>Officia quaerat eaque neque</li>
                                <li>Possimus aut consequuntur incidunt</li>
                                <li class="remove">Lorem ipsum dolor sit amet</li>
                                <li class="remove">Consectetur adipisicing elit</li>
                                <li class="remove">Dolorum esse odio quas architecto sint</li>
                            </ul>
                            <p class="text-center">
                                <a href="#" class="btn btn-secondary">Buy Now</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing">
                            <h3 class="text-center text-black">Premium</h3>
                            <div class="price text-center mb-4 ">
                                <span><span>$200</span> / year</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <li>Officia quaerat eaque neque</li>
                                <li>Possimus aut consequuntur incidunt</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipisicing elit</li>
                                <li class="remove">Dolorum esse odio quas architecto sint</li>
                            </ul>
                            <p class="text-center">
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing">
                            <h3 class="text-center text-black">Professional</h3>
                            <div class="price text-center mb-4 ">
                                <span><span>$750</span> / year</span>
                            </div>
                            <ul class="list-unstyled ul-check success mb-5">

                                <li>Officia quaerat eaque neque</li>
                                <li>Possimus aut consequuntur incidunt</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipisicing elit</li>
                                <li>Dolorum esse odio quas architecto sint</li>
                            </ul>
                            <p class="text-center">
                                <a href="#" class="btn btn-secondary">Buy Now</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row site-section" id="faq-section">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title">Frequently Ask Questions</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Where are you from?</h3>
                            <p>Voluptatum nobis obcaecati perferendis dolor totam unde dolores quod maxime corporis officia et.
                                Distinctio assumenda minima maiores.</p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">What is your opening time?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">Can I accept both Paypal and Stripe?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>

                        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-black h4 mb-4">What available is refund period?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section" id="about-section">
            <div class="container">
                <div class="row mb-5">

                    <div class="col-lg-5 ml-auto mb-5 order-1 order-lg-2" data-aos="fade" data-aos="fade-up" data-aos-delay="">
                        <img src="{{ asset('website/images/about_1.jpg') }}" alt="Image" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1" data-aos="fade">

                        <div class="row">



                            <div class="col-md-12 mb-md-5 mb-0 col-lg-6" data-aos="fade-up" data-aos-delay="">
                                <div class="unit-4">
                                    <div class="unit-4-icon mr-4 mb-3"><span class="text-primary flaticon-head"></span></div>
                                    <div>
                                        <h3>Web &amp; Mobile Specialties</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis consect.</p>
                                        <p class="mb-0"><a href="#">Learn More</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-md-5 mb-0 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="unit-4">
                                    <div class="unit-4-icon mr-4 mb-3"><span class="text-primary flaticon-smartphone"></span></div>
                                    <div>
                                        <h3>Intuitive Thinkers</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis.</p>
                                        <p class="mb-0"><a href="#">Learn More</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <section class="site-section" id="blog-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <h2 class="section-title mb-3">Our Blog</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
                        <div class="h-entry">
                            <a href="single.html">
                                <img src="{{ asset('website/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                            </a>
                            <h2 class="font-size-regular"><a href="#">Where Do You Learn HTML & CSS in 2019?</a></h2>
                            <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente
                                veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                            <p><a href="#">Continue Reading...</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-entry">
                            <a href="single.html">
                                <img src="{{ asset('website/images/img_4.jpg') }}" alt="Image" class="img-fluid">
                            </a>
                            <h2 class="font-size-regular"><a href="#">Where Do You Learn HTML & CSS in 2019?</a></h2>
                            <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente
                                veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                            <p><a href="#">Continue Reading...</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-entry">
                            <a href="single.html">
                                <img src="{{ asset('website/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                            </a>
                            <h2 class="font-size-regular"><a href="#">Where Do You Learn HTML & CSS in 2019?</a></h2>
                            <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente
                                veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                            <p><a href="#">Continue Reading...</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <section class="site-section bg-light" id="contact-section" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="section-title mb-3">Contact Us</h2>
                    </div>
                </div>
                <div class="row mb-5">



                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-room d-block h4 text-primary"></span>
                            <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-4">
                            <span class="icon-phone d-block h4 text-primary"></span>
                            <a href="#">+1 232 3235 324</a>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="mb-0">
                            <span class="icon-mail_outline d-block h4 text-primary"></span>
                            <a href="#">youremail@domain.com</a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-5">



                        <form action="#" class="p-5 bg-white">

                            <h2 class="h4 text-black mb-5">Contact Form</h2>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">First Name</label>
                                    <input type="text" id="fname" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="lname">Last Name</label>
                                    <input type="text" id="lname" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label>
                                    <input type="email" id="email" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Subject</label>
                                    <input type="subject" id="subject" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </section>


        <footer class="site-footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made
                                with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="" target="_blank">EgySolutions</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </footer>

    </div> <!-- .site-wrap -->

    <script src="{{ asset('website/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('website/js/popper.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('website/js/aos.js') }}"></script>
    <script src="{{ asset('website/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('website/js/isotope.pkgd.min.js') }}"></script>


    <script src="{{ asset('website/js/main.js') }}"></script>

</body>

</html>