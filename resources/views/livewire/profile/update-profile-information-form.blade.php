<?php

use App\Models\User;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $gender = '';
    public string $dob = '';
    public ?int $age = null;
    public string $phone = '';
    public ?string $additional_phone = null;
    public string $id_type = '';
    public string $id_number = '';
    public string $id_expiry_date = '';


    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $user = Auth::user();
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email ?? '';

        $patient = $user->patient; 

        $this->gender = $patient->gender ?? '';
        $this->birth_date = $patient->dob ?? '';
        $this->age = $patient->age ?? null;
        $this->phone = $patient->phone ?? '';
        $this->additional_phone = $patient->additional_phone ?? null;
        $this->id_type = $patient->id_type ?? '';
        $this->id_number = $patient->id_number ?? '';
        $this->id_expiry_date = $patient->id_expiry_date ?? '';
        
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
     public function updateProfileInformation(): void
{
    $user = Auth::user();  // Get the authenticated user

    // Validate the fields that are specific to the patient
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        'gender' => ['required', 'string', 'max:255'],
        'dob' => ['required', 'date'],
        'age' => ['nullable', 'numeric'],
        'phone' => ['required', 'string', 'max:255'],
        'additional_phone' => ['nullable', 'string', 'max:255'],
        'id_type' => ['required', 'string', 'max:255'],
        'id_number' => ['required', 'string', 'max:255'],
        'id_expiry_date' => ['required', 'date'],
    ]);

    // Update the user's name and email (these belong to the User model)
    $user->name = $this->name;
    $user->email = $this->email;

    // If the email has changed, mark it as unverified
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Save the user's data (name and email)
    $user->save();

    // Get the associated patient data (Patient model)
    $patient = $user->patient; // This assumes a 'patient' relationship is defined in the User model

    // If no patient record exists, create a new one
    if (!$patient) {
        $patient = new Patient();
        $patient->user_id = $user->id;  // Ensure the 'user_id' is set for the patient
    }

    // Update the patient's data
    $patient->gender = $this->gender;
    $patient->dob = $this->dob;
    $patient->age = $this->age;
    $patient->phone = $this->phone;
    $patient->additional_phone = $this->additional_phone;
    $patient->id_type = $this->id_type;
    $patient->id_number = $this->id_number;
    $patient->id_expiry_date = $this->id_expiry_date;

    // Save the patient's updated data
    $patient->save();

    // Dispatch the 'profile-updated' event
    $this->dispatch('profile-updated', name: $user->name);
}

    

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: RouteServiceProvider::HOME);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="gender" :value="__('Gender')" />
                <select wire:model="gender" id="gender" name="gender" class="mt-1 block w-full border-gray-300 rounded-md" required autofocus autocomplete="gender">
                    <option value="">{{ __('Select Gender') }}</option>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>

            <div>
                <x-input-label for="dob" :value="__('Birth Date')" />
                <x-text-input wire:model="dob" id="dob" name="dob" type="date" class="mt-1 block w-full" required autofocus autocomplete="bday" />
                <x-input-error class="mt-2" :messages="$errors->get('dob')" />
            </div>

            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input wire:model="age" id="age" name="age" type="text" class="mt-1 block w-full" />
                <x-input-error class="mt-2" :messages="$errors->get('age')" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input wire:model="phone" id="phone" name="phone" type="number" class="mt-1 block w-full" required autofocus autocomplete="tel" pattern="\d*" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div>
                <x-input-label for="additional_phone" :value="__('Additional Phone Number')" />
                <x-text-input wire:model="additional_phone" id="additional_phone" name="additional_phone" type="number" class="mt-1 block w-full" required autofocus autocomplete="tel" pattern="\d*" />
                <x-input-error class="mt-2" :messages="$errors->get('additional_phone')" />
            </div>

            <div>
                <x-input-label for="id_type" :value="__('ID Type')" />
                <select wire:model="id_type" id="id_type" name="id_type" class="mt-1 block w-full border-gray-300 rounded-md" required autofocus autocomplete="id_type">
                    <option value="">{{ __('Select ID Type') }}</option>
                    <option value="national_id">{{ __('National ID') }}</option>
                    <option value="iqama">{{ __('Iqama') }}</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('id_type')" />
            </div>

            <div>
                <x-input-label for="id_number" :value="__('ID Number')" />
                <x-text-input wire:model="id_number" id="id_number" name="id_number" type="number" class="mt-1 block w-full" required autofocus autocomplete="id_number" pattern="\d*" maxlength="10" />
                <x-input-error class="mt-2" :messages="$errors->get('id_number')" />
            </div>

            <div>
                <x-input-label for="id_expiry_date" :value="__('ID Expiry Date')" />
                <x-text-input wire:model="id_expiry_date" id="id_expiry_date" name="id_expiry_date" type="date" class="mt-1 block w-full" required autofocus autocomplete="id_expiry_date" />
                <x-input-error class="mt-2" :messages="$errors->get('id_expiry_date')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
