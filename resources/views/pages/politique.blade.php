
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

        <div class="container-fluid featurs py-5 mb-3 mt-5">
            <div class="container py-5">
                <div class="row g-4 mt-5">
                    <div class="col-md-10">
                        <h1>Conditions d'utilisation de <b>UASBC</b></h1>
                
                            <p>Bienvenue sur <b>UASBC</b> ! Avant d'utiliser notre site, veuillez lire attentivement les conditions d'utilisation ci-dessous. En accédant à ce site, vous acceptez de vous conformer à ces conditions. Si vous n'êtes pas d'accord avec une partie quelconque de ces conditions, veuillez ne pas utiliser notre site.</p>
                            
                            <h3>1. Utilisation du Site</h3>
                            
                            <p>1.1 En utilisant <b>UASBC</b>, vous acceptez de ne pas utiliser le site à des fins illégales ou interdites par ces conditions. Vous ne devez pas violer les lois de votre juridiction en accédant à notre site.</p>
                            
                            <p>1.2 Vous acceptez de ne pas perturber, compromettre la sécurité ou interférer avec le bon fonctionnement de notre site.</p>
                            
                            <h3>2. Compte Utilisateur</h3>
                            
                            <p>2.1 Lors de la création d'un compte sur <b>UASBC</b>, vous êtes responsable du maintien de la confidentialité de vos informations de compte, y compris votre nom d'utilisateur et votre mot de passe.</p>
                            
                            <p>2.2 Vous êtes entièrement responsable de toutes les activités qui se produisent sous votre compte.</p>
                            
                            <h3>3. Informations Personnelles et Confidentialité</h3>
                            
                            <p>3.1 Nous respectons la confidentialité de vos informations personnelles. Consultez notre Politique de Confidentialité pour en savoir plus sur la manière dont nous collectons, utilisons et protégeons vos données.</p>
                            
                            <h3>4. Commandes et Paiements</h3>
                            
                            <p>4.1 Toutes les commandes sont soumises à disponibilité des produits. Nous nous réservons le droit d'annuler toute commande pour quelque raison que ce soit.</p>
                            
                            <p>4.2 Les prix des produits sont sujets à changement sans préavis.</p>
                            
                            <p>4.3 Les paiements doivent être effectués conformément aux options de paiement fournies lors du processus de commande.</p>
                            
                            <h3>5. Politique de Retour et Remboursement</h3>
                            
                            <p>5.1 Consultez notre politique de retour et de remboursement pour connaître les détails sur la procédure à suivre en cas de retour de produits.</p>
                            
                            <h3>6. Propriété Intellectuelle</h3>
                            
                            <p>6.1 Le contenu de ce site, y compris mais sans s'y limiter, le texte, les graphiques, les images, les logos et les logiciels, est la propriété de <b>UASBC</b> et est protégé par les lois sur la propriété intellectuelle.</p>
                            
                            <h3>7. Modifications des Conditions d'utilisation</h3>
                            
                            <p>7.1 Nous nous réservons le droit de modifier ces conditions d'utilisation à tout moment. Les modifications prendront effet immédiatement après leur publication sur le site.</p>
                            
                            <p>En continuant à utiliser <b>UASBC</b>, vous acceptez d'être lié par les conditions d'utilisation modifiées.</p>
                            
                            <p>Si vous avez des questions concernant ces conditions d'utilisation, veuillez nous contacter à serviceclient@uasbc.net.</p>
                            
                            <p>Merci de faire partie de <b>UASBC</b> !</p>
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