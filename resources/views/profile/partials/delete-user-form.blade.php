@include('themes.header')
@include('themes.navbar')
@include('themes.sidebar')
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-lg-9 col-md-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __("Suppression de Compte") }}
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
                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Attention') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.') }}
                        </p>
                    </header>

                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    >{{ __('Supprimer Mon Compte') }}</x-danger-button>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Etes-vous sure de vouloir supprimé votre compte ?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __(' Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
                            </p>

                            <div class="mt-6">
                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-3/4"
                                    placeholder="{{ __('Password') }}"
                                />

                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Annuler') }}
                                </x-secondary-button>

                                <x-danger-button class="ms-3">
                                    {{ __('Supprimé') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </section>
            </div>
        </div>
    </div>
    
</x-app-layout>

@include('themes.footer')
