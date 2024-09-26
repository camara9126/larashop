@include('partials.header')
@if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
            @endif
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __("Articles") }}
                </h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('article.create') }}" class="btn btn-primary">Ajout Article</a>
            </div>
        </div>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Date Creation</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($article->count() > 0)
                                @foreach($article as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>
                                <td>
                                    <img src="{{asset($a->image)}}" width="150" alt="">
                                </td>
                                <td>{{$a->title}}</td>
                                <td>
                                    @foreach($categorie as $cat)
                                    @if($cat->id == $a->category_id)
                                       {{$cat->nom}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{$a->created_at}}</td>
                                <td>
                                    @if ($a->status)
                                        <form action="{{ route('article.deactivate', $a) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger">OFF</button>
                                        </form>
                                    @else
                                        <form action="{{ route('article.activate', $a) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success">ON</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('article.view', $a) }}" class="btn btn-outline-primary"><img src="img/oeil.png" width="20" alt=""></a><br>
                                    <a href="{{ route('article.edit', $a) }}" class="btn btn-outline-warning"><img src="img/mise-a-jour.png" width="20" alt=""></a>
                                    <form action="{{ route('article.destroy', $a) }}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><img src="img/poubelle.png" width="20" alt=""></button>
                                    </form>
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
@include('partials.footer')