<?php

namespace App\Transformers;

use App\Models\Dormitory;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['dormitory'];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'student_id' => $user->student_id,
            // 'phone' => $user->phone,
            'nickname' => $user->nickname,
            'avatar' => $user->avatar,
            'dormitory_id' => $user->dormitory_id,
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
        ];
    }

    public function includeDormitory(User $user)
    {
        return $this->item($user->dormitory, new DormitoryTransformer());
    }
}