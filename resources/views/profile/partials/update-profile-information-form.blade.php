@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-lg-9 col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __("Modification Profile") }}
                </h2>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('dashboard') }}" class="btn btn-danger">Annuler</a>
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
                            {{ __("Update your account's profile information and email address.") }}
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
                            <x-text-input id="prename" name="prename" type="text" class="mt-1 block w-full" :value="old('prename', $user->prename)" required autofocus autocomplete="prename" />
                            <x-input-error class="mt-2" :messages="$errors->get('prename')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="telephone" :value="__('Telephone')" />
                            <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel', $user->tel)" required autofocus autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('tel')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800">
                                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600">
                                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>

@include('themes.footer')
