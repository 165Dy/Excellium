{{-- <x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="form-control" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="form-control" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section> --}}







<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations du profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour les informations de votre compte.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                           photoName = $refs.photo.files[0].name;
                           const reader = new FileReader();
                           reader.onload = (e) => {
                               photoPreview = e.target.result;
                           };
                           reader.readAsDataURL($refs.photo.files[0]);
                       " />
                <x-label for="photo" value="{{ __('Photo') }}" />
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>
                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif
                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="form-control" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="form-control" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <!-- Appel -->
        @isset($state->serviteurDeDieu->appel)
            <div class="col-span-6 sm:col-span-4">
                <x-label for="appel" value="{{ __('appel') }}" />
                <x-input id="appel" type="text" class="form-control" wire:model="state.serviteurDeDieu.appel" />
                <x-input-error for="appel" class="mt-2" />
            </div>
        @endisset


        <!-- Phone -->
        @isset($state['phone'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" type="text" class="form-control" wire:model="state.phone" />
                <x-input-error for="phone" class="mt-2" />
            </div>
        @endisset

        <!-- Adresse -->
        @isset($state['adresse'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="adresse" value="{{ __('Adresse') }}" />
                <x-input id="adresse" type="text" class="form-control" wire:model="state.adresse" />
                <x-input-error for="adresse" class="mt-2" />
            </div>
        @endisset

        <!-- ID Card Recto -->
        @isset($state['id_card_recto'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_card_recto" value="{{ __('ID Card Recto') }}" />
                <x-input id="id_card_recto" type="file" class="form-control" wire:model="state.id_card_recto" />
                <x-input-error for="id_card_recto" class="mt-2" />
            </div>
        @endisset

        <!-- ID Card Verso -->
        @isset($state['id_card_verso'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="id_card_verso" value="{{ __('ID Card Verso') }}" />
                <x-input id="id_card_verso" type="file" class="form-control" wire:model="state.id_card_verso" />
                <x-input-error for="id_card_verso" class="mt-2" />
            </div>
        @endisset

        <!-- Is Main -->
        @isset($state['is_main'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="is_main" value="{{ __('Is Main') }}" />
                <x-checkbox id="is_main" wire:model="state.is_main" />
                <x-input-error for="is_main" class="mt-2" />
            </div>
        @endisset

        <!-- Manager -->
        @isset($state['manager'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="manager" value="{{ __('Manager') }}" />
                <x-input id="manager" type="text" class="form-control" wire:model="state.manager" />
                <x-input-error for="manager" class="mt-2" />
            </div>
        @endisset

        <!-- Description -->
        @isset($state['description'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" class="form-control" wire:model="state.description" rows="4"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>
        @endisset

        <!-- Church ID -->
        @isset($state['church_id'])
            <div class="col-span-6 sm:col-span-4">
                <x-label for="church_id" value="{{ __('Church ID') }}" />
                <select id="church_id" class="form-control" wire:model="state.church_id">
                    <option value="">{{ __('Select a Church') }}</option>
                    @foreach ($churches as $church)
                        <option value="{{ $church->id }}" @selected($state['church_id'] == $church->id)>{{ $church->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="church_id" class="mt-2" />
            </div>
        @endisset
        <br>


        <x-button wire:loading.attr="disabled" class="btn btn-primary">
            {{ __('Sauvegarder') }}
        </x-button>
    </x-slot>

    <br>





    {{-- <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>   
    </x-slot> --}}

</x-form-section>
