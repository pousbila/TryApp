<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
       /* Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate(); */

        //Variable poiur recuperer le nom et le prenom entrés dans le formulaire
        $name=$input['firstname'].' '.$input['lastname'];
        //generer un token unique pour verifier le compte de l'utilisateur
        $email=$input['email'];
        $activation_token = md5(uniquid()).$email.sha1($email);

        //Le token est en lien avec un code d'activation qui permet de verifier son mot de passe.
        $activation_code = "";
        $lenght_code = 5;
        for($i=0; $i < $lenght_code; $i++) {
            $activation_code .= mt_rand(0,9);
        }

        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($input['password']),
            'activation_code'=> $activation_code,
            'activation_token'=> $activation_token,


        ]);
    }
}
