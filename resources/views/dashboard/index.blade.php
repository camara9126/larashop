@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')

<x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Votre Compte") }}
            </h2>
        </x-slot>

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