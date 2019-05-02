<?php

namespace App\Http\Controllers;

use App\Libraries\Api;
use App\Services\UserService;
use App\Validators\User\{
    UserCreateValidator,
    UserLoginValidator
};

class UserController extends Controller
{
    protected $userService;
    
    public function __construct(UserService $userServiceInstance)
    {
        parent::__construct();
        
        $this->userService = $userServiceInstance;
    }
    
    /**
     * Create the user
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create()
    {
        $this->validate($this->request, UserCreateValidator::rules(), UserCreateValidator::messages());
        
        $data = $this->userService->create($this->request);
        
        return Api::response($data[RESPONSE_KEY], $data[STT_CODE_KEY]);
    }
    
    /**
     * Login with email and password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $this->validate($this->request, UserLoginValidator::rules(), UserLoginValidator::messages());
        
        $data = $this->userService->login($this->request);
        
        return Api::response($data[RESPONSE_KEY], $data[STT_CODE_KEY]);
    }
    
    /**
     * Get detail user
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail($id)
    {
        $data = $this->userService->getDetail($id);
        
        return Api::response($data[RESPONSE_KEY], $data[STT_CODE_KEY]);
    }
}
