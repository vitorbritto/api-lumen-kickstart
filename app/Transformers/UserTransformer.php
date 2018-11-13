<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        $formattedUser = [
            'id'        => $user->uid,
            'cpf'       => $user->cpf,
            'name'      => $user->name,
            'email'     => $user->email,
            'address'   => $user->address,
            'zipcode'   => $user->zipcode,
            'city'      => $user->city,
            'state'     => $user->state,
            'country'   => $user->country,
            'phone'     => $user->phone,
            'mobile'    => $user->mobile,
            'birth'     => $user->birth,
            'avatar'    => $user->avatar,
            'role'      => $user->role,
            'createdAt' => (string) $user->created_at,
            'updatedAt' => (string) $user->updated_at
        ];

        return $formattedUser;
    }
}