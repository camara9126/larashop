@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')
<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <div class="col-lg-9 col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __("Votre Profile") }}
                </h2>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('dashboard') }}" class="btn btn-danger">Retour</a>
            </div>
        </div>        
    </x-slot>
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Vos informations profile") }}
                        </p>
                    </header>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="prename" :value="__('Prenom')" />
                            <x-text-input id="prename" name="prename" type="text" class="mt-1 block w-full" :value="old('prename', $user->prename)" required autofocus autocomplete="prename" readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('prename')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="telephone" :value="__('Telephone')" />
                            <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel', $user->tel)" required autofocus autocomplete="username" readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('tel')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div>
                            <x-input-label for="matricule" :value="__('Matricule')" />
                            <x-text-input id="matricule" name="matricule" type="text" class="mt-1 block w-full" :value="old('matriclue', $user->matricule)" required autofocus autocomplete="username" readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('matricule')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{route('editer')}}" class="btn btn-outline-warning">{{ __('Modifier mon profile') }}</a>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
@include('themes.footer')