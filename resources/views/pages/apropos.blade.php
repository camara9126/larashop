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

        <div class="container-fluid py-5 mb-3 mt-5">
            <div class="container py-5 ">
                <div class="row g-4 mt-5">
                    <div class="col-md-12">
                        <header>Bienvenue sur <b>UAS-BC</b> – L'Épicentre de la Créativité Étudiante</header>

                        <p>Chez <b>UAS-BC</b>, nous croyons en la puissance de l'innovation étudiante. Notre plateforme est bien plus qu'un simple site e-commerce ; c'est une vitrine dynamique où les esprits créatifs du campus de l'Assane SECK peuvent s'exprimer et partager leurs talents avec la communauté étudiante.</p>
                        
                        <h5>Pour les étudiants, par les étudiants</h5>
                        
                        <p>Nous sommes fiers de mettre en avant les créations uniques de nos utilisateurs, car c'est vous, les étudiants, qui faites de <b>UAS-BC</b> un lieu exceptionnel. Que vous soyez un artiste talentueux, un business-man, un entrepreneur inspiré, ou un innovateur en herbe, notre plateforme est votre scène pour briller. Publiez vos produits et partagez vos idées avec vos pairs, créant ainsi une communauté florissante de talents.</p>
                        <h5>Notre Objectif</h5>
                        <p>
                            UASBC.net est bien plus qu'un simple site de vente en ligne - c'est votre hub exclusif pour découvrir et partager des produits et services entre étudiants. Fini les tracas des groupes WhatsApp bondés, avec UASBC.net, vous pouvez publier facilement vos annonces en un seul endroit sans déranger vos camarades.
                        </p>
                        <p>
                            Accessibilité Universelle: En tant qu'étudiant affecté à l'Université Assane SECK de Ziguinchor, vous avez un accès exclusif à notre plateforme. Trouvez tout ce dont vous avez besoin, de manuels scolaires aux services de tutorat, en un seul endroit.
                            💼 Produits et Services Variés: Explorez une gamme diversifiée de produits et services proposés par vos pairs étudiants. Que ce soit des livres, des appareils électroniques, des services de tutorat ou des articles de seconde main, UASBC.net a ce qu'il vous faut.
                            📱 Facilité d'utilisation: Publier une annonce n'a jamais été aussi simple. Notre interface conviviale vous permet de partager vos offres en quelques clics, atteignant rapidement un public ciblé sans tracas.
                        </p>
                        
                        <h5>Découvrez la Diversité Étudiante</h5>
                        <p>
                            🤝 Communauté Engagée: Rejoignez une communauté dynamique d'étudiants partageant les mêmes idées. Connectez-vous, échangez des conseils et réalisez des transactions en toute confiance au sein de votre propre réseau universitaire.
                            🛒 Économies et Bonnes Affaires: Profitez d'offres spéciales et de négociations directes avec d'autres étudiants. UASBC.net favorise les bonnes affaires, vous permettant d'économiser tout en soutenant vos camarades de classe.
                            Explorez UASBC.net aujourd'hui et découvrez une nouvelle façon pratique et exclusive de naviguer dans le monde des annonces étudiantes. Transformez vos transactions étudiantes en expériences simples et agréables avec UASBC.net !
                        </p>

                        <h5>Soutenez Vos Pairs, Faites Partie de la Communauté</h5>
                        
                        <p>En tant que membre de <b>UAS-BC</b>, vous faites partie intégrante d'une communauté d'étudiants talentueux. Soutenez vos pairs en achetant leurs annonces, partagez vos propres œuvres, et connectez-vous avec d'autres esprits entreprenarials. <b>UAS-BC</b> est plus qu'un marché en ligne ; c'est une expérience collaborative qui célèbre la créativité étudiante sous toutes ses formes.</p>
                        
                        <p>Rejoignez-nous dans cette aventure extraordinaire, où l'innovation et l'expression personnelle sont à l'honneur. <b>UAS-BC</b> - Là où les étudiants brillent.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Fruitables</h1>
                                <p class="text-secondary mb-0">Fresh products</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="">About Us</a>
                            <a class="btn-link" href="">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                            <a class="btn-link" href="">Return Policy</a>
                            <a class="btn-link" href="">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="">My Account</a>
                            <a class="btn-link" href="">Shop details</a>
                            <a class="btn-link" href="">Shopping Cart</a>
                            <a class="btn-link" href="">Wishlist</a>
                            <a class="btn-link" href="">Order History</a>
                            <a class="btn-link" href="">International Orders</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 1429 Netus Rd, NY 48247</p>
                            <p>Email: Example@gmail.com</p>
                            <p>Phone: +0123 4567 8910</p>
                            <p>Payment Accepted</p>
                            <img src="{{asset('assetsH/img/payment.jpg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{('assetsH/lib/easing/easing.min.js')}}"></script>
    <script src="{{('assetsH/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{('assetsH/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{('assetsH/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{('assetsH/js/main.js')}}"></script>
    </body>
    
</html>