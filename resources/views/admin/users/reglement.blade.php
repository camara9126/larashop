@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')

    <x-app-layout>
            <x-slot name="header">
                <div class="row">
                    <div class="col-lg-9 col-md-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Reglement Utilisateurs ({{count($userDay)}})
                        </h2>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger"> Retour</a>
                    </div>
                </div>
            </x-slot>
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Liste de tous les utilisateurs qui devraient faire leur renouvelement aujourd'hui</h1>                           
                                <div class="table-responsive">                                
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Abonnement</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Matricule</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Date Creation</th>
                                                <th scope="col">Articles</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($userDay as $users)
                                            <tr>
                                                <td>{{$users->id}}</td>
                                                <td>
                                                    @if ($users->paiement == 0)
                                                        <form action="{{ route('users.activate', $users) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-danger">Impayé</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('users.desactivate', $users) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success">Payé</button>
                                                        </form>
                                                    @endif
                                                
                                                </td>
                                                <td>{{$users->prename}}</td>
                                                <td>{{$users->name}}</td>
                                                <td>{{$users->email}}</td>
                                                <td>{{$users->matricule}}</td>
                                                <td>{{$users->tel}}</td>
                                                <td>{{$users->created_at}}</td>
                                                <td>
                                                    <a href="{{route('article.articles', $users->id)}}" class="btn btn-outline-warning" title="consulter"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
@include('themes.footer')
