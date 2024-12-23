@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')
    @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
    @endif
    <x-app-layout>
        <x-slot name="header">
            <div class="row">
                <div class="col-lg-9 col-md-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __("Detail Articles") }}
                    </h2>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('article.index') }}" class="btn btn-danger">Retour</a>
                </div>
            </div>
        </x-slot>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <!-- Single Product Start -->
                    <div class="container-fluid py-5 mt-5 pt-5">
                        <div class="container py-5">
                            <div class="row g-4">
                                <div class="col-lg-10 col-xl-10">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="border rounded">
                                                    <img src="{{ asset('storage/'.$articles->image) }}" class="img-fluid rounded" alt="{{$articles->title}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-3">{{ucwords($articles->title)}}</h4>
                                            <p class="mb-3"><b>Categorie:
                                                @foreach($categories as $category)
                                                @if($category->id == $articles->category_id)
                                                    {{$category->name}}
                                                @endif
                                                @endforeach
                                            </b></p>
                                            <h5 class="fw-bold mb-3"><b style="color: black;">{{$articles->price}},00&nbsp;Fcfa</b></h5>
                                            <div class="d-flex mb-4">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class=" text-xl text-gray-600 leading-tight mb-3">{{$articles->content}}</p>
                                            
                                            <p class="mb-2"><strong>Contact :</strong></p>
                                            <b class="btn btn-outline-danger mb-2" title="contact direct"><i class="fa fa-phone" aria-hidden="true">&nbsp;{{Auth::user()->tel}}</i></b>
                                            <a href="https://wa.me/{{auth::user()->tel}}" target="_blank" class="btn btn-outline-success mb-2" title="contact whatsapp"><i class="fa fa-whatsapp"></i></a>
                                            
                                        </div>
                                    </div>
                                    <!-- Partie Admin  -->
                                    @if(Auth::user()->statut == 'admin')
                                    <div class="row g-4">
                                        <div class="col-md-12">
                                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                                               
                                                <h4 class="font-semibold text-center text-xl text-800 leading-tight mb-3">Approbation de l' Admin</h4>
                                                    @foreach($users as $us)
                                                    @if($us->id == $articles->user_id)
                                                        <p class="text-xl mt-2">Propriétaire: 
                                                            <h4 class="font-semibold text-xl text-gray-600 leading-tight">
                                                            {{$us->prename}} {{$us->name}}
                                                            </h4>
                                                        </p>
                                                        <p class="text-xl mt-2">Email: 
                                                            <h4 class="font-semibold text-xl text-gray-600 leading-tight">
                                                            {{$us->email}}
                                                            </h4>
                                                        </p>
                                                        <p class="text-xl mt-2">Contact: 
                                                            <h4 class="font-semibold text-xl text-gray-600 leading-tight">
                                                            {{$us->tel}}
                                                            </h4>
                                                        </p>
                                                        <p class="text-xl mt-2">Matricule: 
                                                            <h4 class="font-semibold text-xl text-gray-600 leading-tight">
                                                            {{$us->matricule}}
                                                            </h4>
                                                        </p>
                                                        
                                                     @endif
                                                    @endforeach
                                                
                                                <!-- <h4><i class="me-1 fa fa-solid fa-phone text-danger">:</i>{{auth::user()->prename}}</h4> -->
                                                <h2 class="font-semibold text-xl text-light-800 leading-tight text-center mt-3">
                                                    @if ($articles->reponse == 1)
                                                        <form action="{{ route('articles.activate', $articles) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-danger" title="rejeté"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('articles.desactivate', $articles) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success" title="approuvé"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                        </form>
                                                    @endif
                                                </h2>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
            </div>
        </div>
    </x-app-layout>
    
@include('themes.footer')