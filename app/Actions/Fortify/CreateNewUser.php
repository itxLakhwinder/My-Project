<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Enums\UserRole;
use App\Models\Customer;

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
        $this->validateRequest($input);

        if($input['role'] == 'customer'){
            $customer = Customer::create(['company_name' => $input['company_name']]);
            $customerId = $customer->id;
            $role = UserRole::Customer;
        }else{
            $customerId = null;
            $role = UserRole::Driver;
        }

           return User::create([
            'first_name' => $input['first_name'],
            'last_name'  => $input['last_name'],
            'email'      => $input['email'],
            'role'       =>  $role,
            'password'   => Hash::make($input['password']),
            'userable_type' => isset($customerId) ? Customer::class : null,
            'userable_id'   => $customerId,
        ]);
    }
       public function validateRequest($input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['required', 'string', 'max:150'],
            'email' => [
                'required',
                'string',
                'email',
                'max:150',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required|same:password',
        ])->validate();
    }

        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => $this->passwordRules(),
        // ])->validate();

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);
}
