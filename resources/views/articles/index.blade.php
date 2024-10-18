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
                        {{ __("Articles") }}
                    </h2>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('article.create') }}" class="btn btn-primary">Ajout Article</a>
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
                                    @if($articles->count() > 0)
                                    @foreach($articles as $art)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img src="{{asset('storage/'.$art->image)}}" alt="{{$art->title}}">
                                            </td>
                                            <td>{{$art->title}}</td>
                                            <td>
                                                @foreach($categories as $cat)
                                                @if($cat->id == $art->id)
                                                    {{$cat->name}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{$art->stock}}</td>
                                            <td>{{$art->created_at}}</td>
                                            <td>
                                                <a href="{{route('article.show', $art->id)}}" class="btn btn-outline-info"><i class="fa fa-eye" aria-hidden="true"></i></a><br>
                                                <a href="{{route('article.edit', $art->id)}}" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i></a><br>
                                                <form action="{{ route('article.destroy', $art->id) }}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <!-- <a href="{{route('article.destroy', $art->id)}}" class="btn btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a> -->
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif    
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
