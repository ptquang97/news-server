<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 05-11-2019
 * Time: 00:01
 */
namespace App\Services;

use App\News;
use Illuminate\Support\Facades\DB;

class NewsService extends BaseService {

    /**
     * TagsService constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getModel() {
        return News::class;
    }

    /**
     * Get News Info
     * @param
     * @return mixed
     */
    public function getNewsInfo($newsId) {
        $result = News::where('id', $newsId)->get();
        return $result;
    }

    /**
     * Create News
     * @param array $attribute
     * @return mixed
     */
    public function createNews($attribute = []) {
        return $this->create($attribute);
    }

    /** Update news
     * @param array $attribute
     * @param $newsId
     * @return mixed
     */
    public function updateNews($attribute = []) {
        $News = News::where('id', $attribute['id'])->update($attribute);
        return $News;
    }

    /** Delete News
     * @param $tagId
     * @return boolean
     */
    public function deleteNews($newsId) {
        News::where('news_id', $newsId)->delete();
        return self::delete($newsId);
    }

    public function upload($attribute = []) {
        return $attribute;
//        $user = User::where('email', $attribute['email'])->first();
//        if ($user) {
//            if ($user->password === $attribute['password']) {
//                return $user;
//            } else {
//                return 'Invalid Password';
//            }
//        } else {
//            return "Invalid Email";
//        }

    }

}
