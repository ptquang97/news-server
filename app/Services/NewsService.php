<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 05-11-2019
 * Time: 00:01
 */
namespace App\Services;

use App\News;
use App\Category;
use App\User;
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
        foreach ($result as $news) {
            $category = Category::where('id', $news->category_id)->first();
            $user = User::where('id', $news->user_id)->first();
            $news->category_name = $category->category_name;
            $news->user_name = $user->userName;
        }
        return $result;
    }

    /**
     * Get News By Category
     * @param
     * @return mixed
     */
    public function getNewsByCategory($categoryId) {
        $result = News::where('category_id', $categoryId)->orderBy('id', 'DESC')->get();
        $category = Category::where('id', $categoryId)->first();
        foreach ($result as $news) {
            $news->category_name = $category->category_name;
        }
        return $result;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getNews() {
        $result = DB::table('news')->orderBy('created_at', 'DESC')->get();
        foreach ($result as $news) {
            $category = Category::where('id', $news->category_id)->first();
            $news->category_name = $category->category_name;
        }
        return $result;
    }

    /**
     * @return array
     * get 3 news each category
     */
    public function getNewsEachCategory() {
        $listCategory = DB::table('category')->orderBy('created_at', 'ASC')->get();
        $listNews = [];
        foreach ($listCategory as $category) {
            $result = News::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();
            for ($i = 0; $i < 3; $i++ ) {
                array_push($listNews, $result[$i]);
            }
        }
        return $listNews;
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
    public function updateNews($attribute = [], $newsId) {
        $News = News::where('id', $newsId)->update($attribute);
        return $News;
    }

    /** Delete News
     * @param $newsId
     * @return boolean
     */
    public function deleteNews($newsId) {
        News::where('id', $newsId)->delete();
        return self::delete($newsId);
    }

    /**
     * @param array $attribute
     * @return array
     */
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
