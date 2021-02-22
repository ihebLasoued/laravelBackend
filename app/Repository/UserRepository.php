<?php

namespace  App\Repository;


use App\User;


use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;




class UserRepository
{
    public function getAllUsers()
    {
        $users = User::get();
        return $users;
    }
    public function  delete($user )
    {

        $user->delete();

    }
    public function getUserById($user_id)
    {
        $user = User::find($user_id);
        return $user;
    }
        /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
        $user = User::where('email', $request['email'])->first();

        if (!$token = JWTAuth::attempt($input)) {
            return [
                'success' => false,
                'message' => 'Invalid Email or Password',
            ];
        }

        return [
            'success' => true,
            'token' => $token,
            'user' => $user
        ];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        /*$this->validate($request, [
            'token' => 'required'
        ]);*/

        try {
            JWTAuth::invalidate($request->token);

            return [
                'success' => true,
                'message' => 'User logged out successfully'
            ];
        } catch (JWTException $exception) {
            return[
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ];
        }
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        //Mail::to( $user->email)->send($user->nom);

        if ($this->loginAfterSignUp) {
            return $this->login($request)->sendEmailVerificationNotification();
        }

return $user;
    }
}
