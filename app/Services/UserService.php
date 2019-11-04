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
     * RideService constructor.
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
     * Get user
     * @param $userId
     * @return mixed
     */
    public function createUser($attribute = []) {
        return $this->create($attribute);
    }

    /**
     * Create user
     * @param array $attribute
     * @return mixed
     */
    public function checkUser($attribute = []) {
        $user = User::where('id', $attribute['uid'])->get();
//        if (sizeof($user) == 0) {
//            $this->create($attribute);
//        }
    }

    /** Update profile
     * @param array $attribute
     * @param $userId
     * @return mixed
     */
    public function updateProfile($attribute = [], $userId) {
        $user = User::where('uid', $userId)->update($attribute);
        return $user;
    }

}