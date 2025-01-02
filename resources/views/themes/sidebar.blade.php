<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <?php
        use Illuminate\Support\Facades\Auth;

        // methode pour calculer la date de fin de 5 jours gratuits
        $dateCreation = Auth::user()->created_at; // Date de création de l'utilisateur
        $dateRestant = $dateCreation->addDays(5); // Ajouter 5 jours

        // fonction pour recupérer le prochain mois de paiement
        $nextMonthDate = $dateCreation->addMonth();
           
    ?>
        @if(Auth::user()->statut == "admin")
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
                    <span class="menu-title">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <span class="icon-bg"><i class="mdi mdi-animation menu-icon"></i></span>
                    <span class="menu-title">Catégorie</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('article.index')}}">
                    <span class="icon-bg"><i class="mdi mdi-cart menu-icon"></i></span>
                    <span class="menu-title">Produits</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.all')}}">
                    <span class="icon-bg"><i class="mdi mdi-account-multiple menu-icon"></i></span>
                    <span class="menu-title">Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.rgm')}}">
                    <span class="icon-bg"><i class="mdi mdi-cash menu-icon"></i></span>
                    <span class="menu-title">Reglement Utilisateurs</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <span class="icon-bg"><i class="mdi mdi-file-document-box menu-icon"></i></span>
                    <span class="menu-title">Tableau de bord</span>
                </a>
            </li>
                
                @if(Auth::user()->paiement == 0)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('abonne')}}">
                        <span class="icon-bg"><i class="mdi mdi-file menu-icon"></i></span>
                        <span class="menu-title">Renouvelement</span>
                    </a>
                </li>
                @endif
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('article.index')}}">
                    <span class="icon-bg"><i class="mdi mdi-cart-plus menu-icon"></i></span>
                    <span class="menu-title">Mes Annonces</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <span class="icon-bg"><i class="mdi mdi-settings menu-icon"></i></span>
                    <span class="menu-title">Parametre</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('editer')}}"> Editer Profil </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('password')}}"> Mot de Passe</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('supprimer')}}"> Supprimer mon compte</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        <hr class="bg-white">
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{route('article.create')}}">
                <span class="icon-bg"><i class="mdi mdi-shop menu-icon"></i></span>
                <span class="menu-title">Publier Une Annonce</span>
            </a>
        </li> -->        
        <li class="nav-item documentation-link">
            <a class="nav-link" data-toggle="collapse" href="#client" aria-expanded="false" aria-controls="client">
                <span class="icon-bg"><i class="mdi mdi-phone menu-icon"></i></span>
                <span class="menu-title">Nos Supports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="client">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="text-white" href="https://wa.me/"> Support Client :</a>
                    </li>
                    <li class="nav-item"> <a class="text-white" href="https://wa.me/"> Support Technique :</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <form method="POST" action="{{ route('logout') }}">
                   @csrf 
                    <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Deconnexion') }}
                    <i class="mdi mdi-logout menu-icon"></i>    
                    </a>
                </form>
            </div>
        </li>
        <!-- <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
                    <span class="menu-title">Take Tour</span></a>
            </div>
        </li> -->
    </ul>
</nav>

<div class="main-panel">
    <div class="content-wrapper">