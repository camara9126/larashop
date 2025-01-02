<div class="container-scroller">
<?php
    use Illuminate\Support\Facades\Auth;

    $dateCreation = Auth::user()->created_at; // Date de création de l'utilisateur
    $dateRestant = $dateCreation->addDays(15); // Ajouter 15 jours
    // $dateRestant = $dateActuelle->diffInDays($dateCreation);
?>
       <!-- partie navbar  -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo text-white" href="/"><p><i class="mdi mdi-home ml-1"></i> Page d' accueil</p></a>
            <a class="navbar-brand brand-logo-mini" href="/">
                <i class="mdi mdi-home ml-1"></i>
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-xl-block">
                @if(Auth::user()->statut == 'client')

                        @if ($dateRestant->isPast())
                        @if(Auth::user()->paiement == 0)
                            <marquee behavior="" direction="left">
                                <h3 class="d-flex align-items-center mt-3"><b><i class="text-danger">
                                    NB :</i> </b>Votre période d'essai a expiré. <a href="{{ route('abonne') }}">Abonnez-vous maintenant</a>.
                                </h3>
                            </marquee>
                        @endif
                        @else
                            <marquee behavior="" direction="left">
                                <h3 class="d-flex align-items-center mt-3"><b><i class="text-danger">
                                    NB :</i> </b>Votre période d'essai gratuit expire le {{ $dateRestant }} .
                                </h3>
                            </marquee>
                        @endif
 
                @elseif(Auth::user()->statut == 'admin')
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <!-- formulaire de recherche article  -->
                            <form class="d-flex align-items-center h-100" method="get" action="{{route('search.article')}}">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                    </div>
                                    <input type="text" name="article" class="form-control bg-transparent border-0" value="{{ request()->article ?? ''}}" placeholder="Search products">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <!-- formulaire de recherche utilisateur  -->
                            <form class="d-flex align-items-center h-100" method="get" action="{{route('search.user')}}">
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                    </div>
                                    <input type="text" name="user" class="form-control bg-transparent border-0" value="{{ request()->user ?? ''}}" placeholder="Search user">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                @endif
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{asset('assetsH/img/avatar.jpg')}}" alt="image">
                        </div>                        
                        <!-- <div class="nav-profile-text">
                           {{ Auth::user()->name }}
                        </div>  -->
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                        aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                        <div class="p-3 text-center bg-primary">
                            <span class="bg-white d-center" style="width: auto; border-radius: 100%"><b>{{Auth::user()->prename[0].Auth::user()->name[0]}}</b></span>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="{{route('profile.edit')}}">
                                <span>Profile</span>
                                <span class="p-0">
                                    <span class="badge badge-success"></span>
                                    <i class="mdi mdi-account-outline ml-1"></i>
                                </span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Deconnexion') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>