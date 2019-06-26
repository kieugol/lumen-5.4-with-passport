<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class UserService extends BaseService
{
    protected $userRep;

    public function __construct(UserRepository $userRepInstance)
    {
        $this->userRep = $userRepInstance;
    }

    /**
     * Handle getting detail user.
     *
     * @param $id
     *
     * @return array
     */
    public function getDetail($id)
    {
        try {
            $data = $this->userRep->find($id);
            $this->setData($data);
        } catch (ModelNotFoundException $ex) {
            $this->setMessage(trans('message.not_found_data'));
        }

        return $this->getResponseData();
    }

    /**
     * Handle creating new user.
     *
     * @param Request $request
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     *
     * @return array
     */
    public function create(Request $request)
    {
        $user = $this->userRep->create([
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'email'      => $request['email'],
            'password'   => password_hash($request['password'], PASSWORD_BCRYPT),
            'age'        => $request['age'] ?? null,
        ]);

        $this->setMessage(trans('message.created_successfully'));
        $this->setData($user);

        return $this->getResponseData();
    }

    /**
     * Handle login with email and password.
     *
     * @param Request $request
     *
     * @return array
     */
    public function login(Request $request)
    {
        $user = $this->userRep->findByField('email', $request['email'])->first();

        if ($user && Hash::check($request['password'], $user->password)) {
            $user->token = $user->createToken('DemoToken')->accessToken;

            $this->setMessage(trans('message.login_successfully'));
            $this->setData($user);
        } else {
            abort(Response::HTTP_UNAUTHORIZED, trans('message.not_found_user'));
        }

        return $this->getResponseData();
    }
}
