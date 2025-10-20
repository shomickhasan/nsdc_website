<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }
    public function findByContact($phone)
    {
         return $this->query()->where('phone',$phone)->first();
    }

    public function getAccessToken(User $user)
    {
        $token = $user->createToken('user token');
        return [
            'auth_type' => 'Bearer',
            'token' => $token->accessToken,
            // 'expires_at' => $token->token->expires_at->format('Y-m-d H:i:s'),
        ];
    }


   
   
}