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
                        {{ __("Modification Articles") }}
                    </h2>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('article.index') }}" class="btn btn-danger">Annuler</a>
                </div>
            </div>
        </x-slot>
        
        <div class="py-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('article.update', $articles->id) }}" enctype="multipart/form-data" id="create_form">
                @csrf
                <!-- user_id -->
                 <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <!-- bloc des images -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Votre Photo</h2>
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset('storage/'.$articles->image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bloc des details  -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Decriver votre annonce</h2>
                             <p class="text-danger text-center"><b class="text-danger ">NB:</b> Modification <strong>Titre</strong> et <strong>Catégorie</strong> non valide !</p>
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                <label for="title">titre :</label>
                                <input type="text" name="title" id="text" value="{{$articles->title}}" class="form-control" readonly>
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="category">Categorie</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <!-- <option value="">{{$articles->category_id}}</option> -->
                                        @foreach($categories as $cat)
                                        @if($cat->id == $articles->category_id)
                                        <option value="{{$cat->id}}">{{strtoupper($cat->name)}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="price">Prix</label>
                                    <input type="text" name="price" id="price" value="{{$articles->price}}" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="stock">Quantite de stock</label>
                                    <input type="number" name="stock" id="stock" value="{{$articles->stock}}" class="form-control">
                                </div>
                            </div>
                            <div class=" col-md-8 form-group">
                                <label for="content">Description</label>
                                <textarea name="content" id="content" cols="10" rows="5" class="form-control">value="{{$articles->content}}"</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">
                        <input type="hidden" name="contact" id="contact" value="{{Auth::user()->tel}}">
                            <button type="submit" class="btn btn-outline-warning">Modifier</button>
                        </h2>
                    </div>
            </form> 
        </div>
    </x-app-layout>
    
@include('themes.footer')