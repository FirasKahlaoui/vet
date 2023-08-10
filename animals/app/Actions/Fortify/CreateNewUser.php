<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],        
        [
            'name.required' => 'Le nom est obligatoire ',
            'email.unique' => 'Champ Email est obligatoire ',
            'type.required' => 'Champ type est obligatoire ',
            'tel.required' => 'Champ tel est obligatoire ',
            'ville.required' => 'Champ ville est obligatoire ',


            

        ])->validate();

        return User::create([
            'name' => $input['name'],
            'type' => $input['type'],
            'email' => $input['email'],
            'tel' => $input['tel'],
            'ville' => $input['ville'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
