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
                            <div class="row g-4 mb-5">
                                <div class="col-lg-8 col-xl-9">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="border rounded">
                                                <a href="#">
                                                    <img src="{{asset('$articles-image')}}" class="img-fluid rounded" alt="Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="fw-bold mb-3">{{$articles->title}}</h4>
                                            <p class="mb-3">Categorie:
                                                @foreach($categories as $category)
                                                @if($category->id == $articles->category_id)
                                                    {{$category->name}}
                                                @endif
                                                @endforeach
                                            </p>
                                            <h5 class="fw-bold mb-3">{{$articles->price}},00&nbsp;Fcfa</h5>
                                            <div class="d-flex mb-4">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="mb-4">{{$articles->content}}</p>
                                            
                                            <a href="{{route('article.edit', $articles->id)}}" class="btn btn-outline-warning mb-2" title="modifié"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a href="{{route('article.destroy', $articles->id)}}" class="btn btn-outline-danger mb-2" title="supprimé"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            
                                        </div>
                                    </div>
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