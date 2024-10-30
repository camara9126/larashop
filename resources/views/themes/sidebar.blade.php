<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('article.index')}}">
                <span class="icon-bg"><i class="mdi mdi-new menu-icon"></i></span>
                <span class="menu-title">Mes Annonces</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('article.create')}}">
                <span class="icon-bg"><i class="mdi mdi-shop menu-icon"></i></span>
                <span class="menu-title">Publier Une Annonce</span>
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
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{route('profile.edit')}}">
                <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
                <span class="menu-title">Profil</span>
            </a>
        </li> -->
        
        <li class="nav-item documentation-link">
            <a class="nav-link" href="#" target="_blank">
                <span class="icon-bg">
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                </span>
                <span class="menu-title">Service Client</span>
            </a>
        </li>
        <!-- <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
                    <span class="menu-title">Take Tour</span></a>
            </div>
        </li> -->
        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                     <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Deconnexion') }}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>

<div class="main-panel">
    <div class="content-wrapper">