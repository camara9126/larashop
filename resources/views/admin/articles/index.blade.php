@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')


    <x-app-layout>
            <x-slot name="header">
                <div class="row">
                    <div class="col-lg-9 col-md-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Articles ({{count($articlesA)}})
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
                                <div class="table-responsive">                                    
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Titre</th>
                                                <th scope="col">Categorie</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Date Creation</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($articlesA as $art)
                                            <tr>
                                                <th scope="row"></th>
                                                <td>
                                                    <img src="{{asset('storage/'.$art->image)}}" alt="{{$art->title}}">
                                                </td>
                                                <td>{{$art->title}}</td>
                                                <td>
                                                    @foreach($categories as $cat)
                                                    @if($cat->id == $art->category_id)
                                                        {{$cat->name}}
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$art->stock}}</td>
                                                <td>{{$art->created_at}}</td>
                                                <td>
                                                    <a href="{{route('article.show', $art->id)}}" class="btn btn-outline-warning" title="consulter"><i class="fa fa-eye" aria-hidden="true"></i></a><br>
                                                    <!-- <a href="{{route('article.edit', $art->id)}}" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i></a><br> -->
                                                    @if ($art->reponse == 1)
                                                        <button type="" class="btn btn-danger" title="rejeté"><i class=" fa fa-times" aria-hidden="true"></i></button>
                                                    @else
                                                        <button type="" class="btn btn-success" title="approuvé"><i class=" fa fa-check" aria-hidden="true"></i></button>
                                                    @endif
                                                
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
