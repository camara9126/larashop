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

        <div class="col-md-10">
            <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                <h4 id="list-item-1" class="text-warning text-center bg-success">Point 1</h4>
                <h5>Ne pas envoyer de paiements sans avoir consulté le produit.</h5>
                <p>
                    Il est fortement recommandé de ne pas effectuer de paiements avant d'avoir examiné attentivement le produit en question.
                    Cette consigne souligne l'importance de prendre le temps de se familiariser avec les détails du produit ou du service proposé avant de procéder à toute transaction financière.
                    En suivant cette recommandation, on s'assure d'éviter des situations imprévues et de garantir que le produit correspond aux attentes avant de s'engager financièrement.
                    En résumé, il est conseillé de bien connaître le produit avant de procéder à tout paiement.
                </p>
                <h4 id="list-item-2" class="text-warning text-center bg-success">Point 2</h4>
                <h5>Ne pas envoyer d'argent par des moyens de transfert d'argent ou par n'importe quels autres moyens de transfer d'argent.</h5>
                <p>
                    Il est vivement recommandé de s'abstenir d'envoyer des fonds par des moyens de transfert d'argent ou par tout autre mode de transaction financier avant d'avoir pris toutes les précautions nécessaires.
                    Cette recommandation souligne la nécessité d'éviter l'utilisation de services de transfert d'argent ou d'autres mécanismes similaires avant d'avoir examiné minutieusement les détails de la transaction.
                    En suivant cette directive, on peut prévenir les risques liés à des transactions frauduleuses ou malintentionnées.
                    Il est essentiel de comprendre pleinement les conditions, les garanties et les aspects spécifiques de la transaction avant de procéder à l'envoi d'argent.
                    En adoptant cette approche prudente, on minimise les risques potentiels liés aux transactions financières et on garantit une meilleure sécurité dans le processus d'échange de fonds.
                </p>
                <h4 id="list-item-3" class="text-warning text-center bg-success">Point 3</h4>
                <h5> Donner rdv au fournisseur/client dans un lieu public à une heure de passage.</h5>
                <p>
                    Il est recommandé d'organiser les rendez-vous avec les fournisseurs ou clients dans des lieux publics à des heures de passage.
                    Cette approche vise à assurer la sécurité et la transparence lors des rencontres professionnelles.
                    En choisissant un lieu public, on crée un environnement neutre et accessible, ce qui peut contribuer à établir un climat de confiance mutuelle.
                    L'horaire de passage suggéré permet d'optimiser la visibilité et la fréquentation du lieu, réduisant ainsi les risques potentiels liés à des situations peu sûres.
                    En adoptant cette pratique, on favorise des échanges professionnels sécurisés et efficaces, tout en minimisant les préoccupations liées à la sécurité personnelle lors des rendez-vous d'affaires
                </p>
                <h4 id="list-item-4" class="text-warning text-center bg-success">Point 4</h4>
                <h5>Prener le temps de bien discuter avec le vendeur/fournisseur sur le prix/produit.</h5>
                <p>
                Il est recommandé de consacrer le temps nécessaire à une discussion approfondie avec le vendeur ou fournisseur concernant le prix et le produit.
                Cette approche vise à garantir une compréhension mutuelle et précise des termes de la transaction.
                En engageant une conversation détaillée, on peut clarifier les spécificités du produit, s'assurer de sa conformité aux attentes et comprendre pleinement les aspects financiers de la transaction.
                Cette démarche contribue à établir une relation plus transparente entre les parties, favorisant ainsi des négociations plus équitables.
                En prenant le temps nécessaire pour discuter en profondeur, on minimise les risques de malentendus et on crée un environnement propice à des accords commerciaux bénéfiques pour toutes les parties impliquées. 
                </p>
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