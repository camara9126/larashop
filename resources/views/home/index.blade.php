<?php

    use App\Models\articles;
    use App\Models\categories;

    $articles= articles::where('reponse',0)->get();
    $categories= categories::all();
    
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{('assetsH/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{('assetsH/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{('assetsH/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{('assetsH/css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- navbar Start  -->
            @include('layouts.navbar')
        <!-- navbar End  -->

        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-5">
                        <h4 class="mb-3 text-secondary">Bienvenue Chez Vous !</h4>
                        <h1 class="mb-5 display-3 text-primary">Organic Veggies & Fruits Foods</h1>
                        <!-- <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div> -->
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{asset('assetsH/img/hero-img-1.jpg')}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('assetsH/img/hero-img-2.jpg')}}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        <!-- <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over $300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Featurs Section End -->


        

        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5 mb-1">
            <div class="container py-5">
                <h1 class="mb-0">Fresh Organic Vegetables</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-6.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-1.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-3.jpg')}}" class="img-fluid w-100 rounded-top bg-light" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Banana</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-4.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Bell Papper</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-6.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye  me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye  me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('assetsH/img/vegetable-item-6.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-1">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye  me-2 text-primary"></i> Consuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->

        <!-- All articles Start-->
        <div class="container-fluid vesitable py-5 mb-1">
            <div class="container py-5">
                <h1 class="mb-0">Tous Les Articles</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">                   
                    @foreach($articles as $art)                    
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('storage/'.$art->image)}}" class="img-fluid w-100 rounded-top" alt="{{$art->title}}">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
                            @foreach($categories as $cat)
                            @if($art->category_id == $cat->id)
                                {{$cat->name}}
                            @endif
                            @endforeach
                        </div>
                        <div class="p-4 rounded-bottom">
                            <h5>{!!Str::limit($art->title, 10)!!}</h5>
                            <p>{!!Str::limit($art->content, 50)!!}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mt-0">{{$art->price}} FCFA</p>
                                <a href="{{route('article.view', $art->slug)}}" class="btn border border-secondary rounded-pill px-3 text-primary">
                                    <i class="fa fa-eye  me-2 text-primary"></i> Consuler
                                </a>
                            </div>
                        </div>
                    </div>                  
                    @endforeach
                </div>
            </div>
        </div>
        <!-- All articles End -->

        <!-- Selection par categorie Start-->
        <div class="container-fluid fruite py-5 mb-1">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Selection par catégories</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-0">
                                        <span class="text-dark" style="width: 130px;">Tout articles</span>
                                    </a>
                                </li>
                                @foreach($categories as $cat)
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{$cat->id}}">
                                        <span class="text-dark" style="width: 130px;">{{$cat->name}}</span>
                                    </a>
                                </li>
                                @endforeach                                                               
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-0" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @foreach($articles as $id)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{asset('storage/'.$id->image)}}" class="img-fluid w-100 rounded-top" alt="{{$id->title}}">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                                    @foreach($categories as $cat)
                                                    @if($id->category_id == $cat->id)
                                                        {{$cat->name}}
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{!!Str::limit($id->title, 10)!!}</h4>
                                                    <p>{!!Str::limit($id->content, 50)!!}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-1">{{$id->price}} FCFA</p>
                                                        <a href="{{route('article.view', $id->slug)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye  me-2 text-primary"></i> Consulter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-1" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @foreach($articles as $id)
                                    @if($id->category_id == 1)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{asset('storage/'.$id->image)}}" class="img-fluid w-100 rounded-top" alt="{{$id->title}}">
                                                </div>
                                                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{!!Str::limit($id->title, 10)!!}</h4>
                                                    <p>{!!Str::limit($id->content, 50)!!}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-1">{{$id->price}} FCFA</p>
                                                        <a href="{{route('article.view', $id->slug)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye  me-2 text-primary"></i> Consuler</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @foreach($articles as $id)
                                    @if($id->category_id == 2)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{asset('storage/'.$id->image)}}" class="img-fluid w-100 rounded-top" alt="{{$id->title}}">
                                                </div>
                                                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{!!Str::limit($id->title, 10)!!}</h4>
                                                    <p>{!!Str::limit($id->content, 50)!!}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-1">{{$id->price}} FCFA</p>
                                                        <a href="{{route('article.view', $id->slug)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @foreach($articles as $id)
                                    @if($id->category_id == 3)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{asset('storage/'.$id->image)}}" class="img-fluid w-100 rounded-top" alt="{{$id->title}}">
                                                </div>
                                                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{!!Str::limit($id->title, 10)!!}</h4>
                                                    <p>{!!Str::limit($id->content, 50)!!}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-1">{{$id->price}} FCFA</p>
                                                        <a href="{{route('article.view', $id->slug)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fas-eye me-2 text-primary"></i> Consulter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @foreach($articles as $id)
                                        @if($id->category_id == 4)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{asset('storage/'.$id->image)}}" class="img-fluid w-100 rounded-top" alt="{{$id->title}}">
                                                </div>
                                                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{!!Str::limit($id->title, 10)!!}</h4>
                                                    <p>{!!Str::limit($id->content, 50)!!}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-1">{{$id->price}} FCFA</p>
                                                        <a href="{{route('article.view', $id->slug)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> Consuler</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <!-- Selection par categorie End-->

        <!-- Footer Start -->
         @include('layouts.footer')
        <!-- Footer End -->

        