<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255','alpha'],
            'last_name' => ['required','string', 'max:100', 'min:3','alpha'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'group' => ['required','string'],
            'birth' => ['required', 'date','before:2010-12-31'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'last' => $input['last_name'],
                'email' => $input['email'],
                'group' => $input['group'],
                'birth' => $input['birth'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
<<<<<<< HEAD
            })->assignRole('Student');
=======
            });
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
