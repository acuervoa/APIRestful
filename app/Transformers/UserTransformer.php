<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    /**
     * A Fractal transformer.
     *
     * @param \App\User $user
     *
     * @return array
     */
    public function transform(User $user) {
        return [
            'identifier' => (int) $user->id,
            'name' => (string) $user->name,
            'email' => (string) $user->email,
            'isVerified' => (int) $user->verified,
            'isAdmin' => ($user->admin === 'true'),
            'createdDate' => (string) $user->created_at,
            'updatedDate' => (string) $user->updated_at,
            'deletedDate' => isset($user->deleted_at) ? (string) $user->deleted_at : NULL,
            'links' => [
                'rel' => 'self',
                'href' => route('users.show', $user->id),
            ],
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'identifier' => 'id',
            'name' => 'name',
            'email' => 'email',
            'isVerified' => 'verified',
            'isAdmin' => 'admin',
            'createdDate' => 'created_at',
            'updatedDate' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : NULL;
    }

    public static function transformedAttribute($index) {
        $attributes = [
            'id' => 'identifier',
            'name' => 'name',
            'email' => 'email',
            'verified' => 'isVerified',
            'admin' => 'isAdmin',
            'created_at' => 'createdDate',
            'updated_at' => 'updatedDate',
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : NULL;
    }
}
