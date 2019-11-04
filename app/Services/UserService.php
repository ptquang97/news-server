<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/1/2019
 * Time: 3:27 PM
 */
namespace App\Services;

use App\User;
class UserService extends BaseService {

    /**
     * UserService constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getModel() {
        return User::class;
    }

    /**
     * Get user
     * @param $userId
     * @return mixed
     */
    public function getProfile($userId) {
        $result = User::where('id', $userId)->first();
        return $result;
    }

    /**
     * Create user
     * @param array $attribute
     * @return mixed
     */
    public function createUser($attribute = []) {
        return $this->create($attribute);
    }

    /**
     * Login
     * @param array $attribute
     * @return mixed
     */
    public function login($attribute = []) {
        $user = User::where('email', $attribute['email'])->first();
        if ($user) {
            if ($user->password === $attribute['password']) {
                return $user;
            } else {
                return 'Invalid Password';
            }
        } else {
            return "Invalid Email";
        }

    }

    /** Update profile
     * @param array $attribute
     * @param $userId
     * @return mixed
     */
    public function updateProfile($attribute = [], $userId) {
        $user = User::where('id', $userId)->update($attribute);
        return $user;
    }

}
