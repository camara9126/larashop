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
                    <div class="col-lg-10 col-md-10">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __("Articles Recherché") }}
                        </h2>
                    </div>
                </div>
            </x-slot>
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                                @foreach($resultat as $res)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    
                                    <div class="rounded position-relative fruite-item">
                                        <div class="dashboard-img">
                                            <img src="{{asset('storage/'.$res->image)}}" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                        <div class="p-4 text-dark border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{$res->title}}</h4>
                                            <!-- <p>{{$res->content}}</p> -->
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark text-xl fs-5 fw-bold mb-1">{{$res->price}} Fcfa</p></br>
                                                <div class="row mt-2">
                                                    <a href="" class="btn btn-outline-info" title="vue(s)"><i class="fa fa-logs" aria-hidden="true"></i>{{$res->click_count}}</a>
                                                    <a href="{{route('article.show', $res->id)}}" class="btn btn-outline-warning" title="consulter"><i class="fa fa-eye" aria-hidden="true"></i></a><br>
                                                    @if ($res->reponse == 1)
                                                        <button type="" class="btn btn-danger" title="rejeté"><i class=" fa fa-times" aria-hidden="true"></i></button>
                                                    @else
                                                        <button type="" class="btn btn-success" title="approuvé"><i class=" fa fa-check" aria-hidden="true"></i></button>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            <!-- </div> -->
    </x-app-layout>
@include('themes.footer')
                      