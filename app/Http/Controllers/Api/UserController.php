<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Api;
use App\Services\UserService;
use App\User;
class UserController extends Controller
{
    protected $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request) {
        $result = $this->userService->createUser($request->all());
        if ($result) {
            return Api::r_response($result, "Create success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkUser(Request $request) {
        $result = $this->userService->checkUser($request->all());
        return Api::r_response($result, 'Check user success', 'S200');
    }

    /**
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile($userId) {
        $user = $this->userService->getProfile($userId);
        if ($user) {
            return Api::r_response($user, 'Get success', 'S200');
        }
        return Api::r_response("", 'Server error', 'E500');
    }

    /**
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request, $userId) {
        $result = $this->userService->updateProfile($request->all(), $userId);
        if ($result) {
            return Api::r_response("", 'Edit user success', 'S204');
        }
        return Api::r_response("", 'Server error', 'E500');
    }
}
