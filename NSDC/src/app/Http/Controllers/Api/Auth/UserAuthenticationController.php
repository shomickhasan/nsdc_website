<?php

namespace App\Http\Controllers\Api\Auth;

use \Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserRolePermission;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
class UserAuthenticationController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo=$userRepo;
        $this->middleware('auth:api')->except('login');
    }
    
    public function login(LoginRequest $request)
{
        try{
            $user = $this->userRepo->findByContact($request->phone);
            if ($user && Hash::check($request->password,$user->password)) {
                if($user->status == 1){
                    return $this->success([
                        'user' => new UserResource($user),
                        'access' => $this->userRepo->getAccessToken($user)
                        ],'Login successful', 200);
                }else{
                    return $this->error('Access denied: You have been blocked from accessing the admin functionality.', 400, '400');
                }
            }
            return $this->error('Credential is invalid!', 401, 401);

        } catch (QueryException $e) {
            return $this->error('SQLSTATE[42S02]: Base table or view not found: 1146 Table your_database.your_table doesn not exist', 500, 500);
        } catch (Exception $e) {
            return $this->error('Something went wrong. Please try again later.', 500, 500);
        } 
    }
    public function logout()
    {
        $user=auth()->user();
        if($user){
            $user->token()->revoke();
            return $this->success('Logout SuccessFully',200);
        }
        return $this->error("Login User Not Found",400,400);
    }

    public function me()
    {
        
        try{
            $user = auth()->user();
            $permissions = $user->permissions->isNotEmpty()
            ? $user->permissions
            : $user->roles->pluck('permissions')->flatten()->unique();

            return $this->success([
                'permission' => $permissions->pluck('name'),
            ], 'User Role Permission', 200);
        } catch (QueryException $e) {
            return $this->error('SQLSTATE[42S02]: Base table or view not found: 1146 Table your_database.your_table doesn not exist', 500, 500);
        } catch (Exception $e) {
            return $this->error('Something went wrong. Please try again later.', 500, 500);
        }  
    }

    public function userTerritory()
    {
        try{
            $user = auth()->user();
            $territories = $user->territories->isNotEmpty()
            ? $user->territories->flatten()->unique()
            : '';

            return $this->success([
                'territories' => $territories,
            ], 'User Territory', 200);
        } catch (QueryException $e) {
            return $this->error('SQLSTATE[42S02]: Base table or view not found: 1146 Table your_database.your_table doesn not exist', 500, 500);
        } catch (Exception $e) {
            return $this->error('Something went wrong. Please try again later.', 500, 500);
        }  
    }
}
