<?php

use App\Models\User;
use App\Models\articles;
use App\Models\categories;

    $articles= articles::all();
    $categories= categories::all();
    $users=User::where(['statut'=>'client']);
?>
@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')

<x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Votre Tableau De Bord") }}
            </h2>
        </x-slot>

        <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class="mb-2 text-dark font-weight-normal">Produits</h3>
                                <h2 class="mb-4 text-dark font-weight-bold">{{$articles->count()}}</h2>
                                <div
                                    class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                                    <i class="mdi mdi-format-list-bulleted icon-md absolute-center text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class="mb-2 text-dark font-weight-normal">Catégories</h3>
                                <h2 class="mb-4 text-dark font-weight-bold">{{$categories->count()}}</h2>
                                <div
                                    class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                                    <i class="mdi mdi-animation icon-md absolute-center text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class="mb-2 text-dark font-weight-normal">Clients</h3>
                                <h2 class="mb-4  text-dark font-weight-bold">{{$users->count()}}</h2>
                                <div
                                    class="dashboard-progress mb-5 pb-3 dashboard-progress-4 d-flex align-items-center justify-content-center item-parent">
                                    <i class="mdi mdi-account-multiple icon-md absolute-center text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col"><h5>Informations Personnels</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h4><b>{{Auth::user()->prename}}&nbsp;{{Auth::user()->name}}</b></h4>
                                    <h4><b>{{Auth::user()->matricule}}</b></h4>
                                    <h4><b>{{Auth::user()->email}}</b></h4>
                                    <h4><b>+221&nbsp;{{Auth::user()->tel}}</b></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-app-layout>

@include('themes.footer')