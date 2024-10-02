@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Rediger une Annonce") }}
            </h2>
        </x-slot>
        
        <div class="py-12">
            <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data" id="create_form">
                @csrf
                <!-- user_id -->
                 <input type="hidden" name="user_id" value="{{auth::user()->id}}">
                    <!-- bloc des images -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Inserer des photos</h2>
                            <div class="row mt-3">
                                <div class="col-md-4 form-group">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>

                                <div class="col-md-4 form-group">
                                    <input type="file" name="image2" id="image" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="file" name="image3" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bloc des details  -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Decriver votre annonce</h2>
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                <label for="title">titre</label>
                                <input type="text" name="title" id="text" class="form-control">
                                </div>
                                <div class=" col-md-6 form-group">
                                    <label for="category">Choisir une Categorie</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Veuiller choisir une categorie</option>
                                        @foreach($categorie as $cat)
                                        <option value="{{$cat->id}}">{{strtoupper($cat->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="price">Prix</label>
                                    <input type="text" name="price" id="price" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="stock">Quantite de stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control">
                                </div>
                            </div>
                            <div class=" col-md-8 form-group">
                                <label for="content">Description</label>
                                <textarea name="content" id="content" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- bloc contact  -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Votre Contact</h2>
                             <div class="row">
                                <div class="col-md-8">
                                    <h4><i class="fa-brands fa-whatsapp text-success">:</i>{{auth::user()->tel}}</h4><br>
                                    <h4><i class="me-1 fa fa-solid fa-phone text-danger">:</i>{{auth::user()->tel}}</h4>
                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">
                                <button type="submit" class="btn btn-outline-success">Publier</button>
                            </h2>
                    </div>
            </form>         
        </div>
    </x-app-layout>

@include('themes.footer')