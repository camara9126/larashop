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
        <div class="row">
                <div class="col-lg-9 col-md-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __("Ajouter Une Categorie") }}
                    </h2>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Annuler</a>
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
            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" id="create_form">
                @csrf
                    <!-- bloc des images -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">Titre</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">
                                <button type="submit" class="btn btn-outline-success">Ajouter</button>
                            </h2>
                    </div>
            </form>
        </div>
    </x-app-layout>
include('themes.footer')