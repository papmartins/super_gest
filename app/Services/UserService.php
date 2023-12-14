<?php 

namespace App\Services;

use \App\Models\User;
use \App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserService
{

    protected $user;
    protected $userRepository;
    
    public function __construct() {
        $this->user = new User();
        $this->userRepository = new UserRepository($this->user);
    }

    public function validateUser(Request $request) {
        $email = $request->get('user');
        $password = $request->get('password');

        $user = $this->userRepository->getByEmail($email);

        return $user && Hash::check($password, $user->password)  ? $user : null;
    }
}

