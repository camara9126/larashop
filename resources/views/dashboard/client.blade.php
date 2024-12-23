@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')
<?php
    use Illuminate\Support\Facades\Auth;

    // methode pour calculer la date de fin de 5 jours gratuits
    $dateCreation = Auth::user()->created_at; // Date de création de l'utilisateur
    $dateRestant = $dateCreation->addDays(15); // Ajouter 15 jours

    // fonction pour recupérer le prochain mois de paiement
    $nextMonthDate = $dateCreation->addMonth();
?>
<x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Votre Compte") }}
            </h2>
            <hr><br>
            @if ($dateRestant->isPast())
            @if(Auth::user()->paiement == 0)
                <h3 class="font-semibold text-xl text-gray-600 leading-tight mb-2"><b><i class="text-danger">
                    NB :</i> </b>Votre période d'essai a expiré. <a href="{{ route('abonne') }}">Abonnez-vous maintenant</a>.
                </h3>
            @endif
            @else
                <h3 class="font-semibold text-xl text-gray-600 leading-tight mb-2"><b><i class="text-danger">
                    NB :</i> </b>Votre période d'essai gratuit expire le {{ $dateRestant }} .
                </h3>
            @endif

            <hr>
             <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col"><h5>Informations Profile</h5></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4><b>{{Auth::user()->prename}}&nbsp;{{Auth::user()->name}}</b></h4>
                                        <h4><b>{{Auth::user()->matricule}}</b></h4>
                                        <h4><b>{{Auth::user()->email}}</b></h4>
                                        <h4><b>+221&nbsp;{{Auth::user()->tel}}</b></h4>
                                        <h4><b>Inscris le {{Auth::user()->created_at}}</b></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <h3 class="font-semibold text-xl-center text-gray-600 leading-tight mb-3">Vos Articles récements consultés</h3>
                        <div class="row g-4">
                            @foreach($articlesC as $art)
                            @if($art->click_count > 0)
                                
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{asset('storage/'.$art->image)}}" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{$art->title}}</h4>
                                            <!-- <p>{{$art->content}}</p> -->
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-1">{{$art->price}} Fcfa</p><br>
                                                <a href="" class="btn border border-secondary rounded-pill px-3 text-primary"> Vue {{$art->click_count}} X</a>
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

        </x-slot>

       
</x-app-layout>

@include('themes.footer')