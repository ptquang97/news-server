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
use App\Tags;
use App\User;
use Illuminate\Support\Facades\DB;

class NewsService extends BaseService
{

    /**
     * TagsService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return News::class;
    }

    /**
     * Get News Info
     * @param
     * @return mixed
     */
    public function getNewsInfo($newsId)
    {
//        var_dump($result->tags_id);
//        exit;
//        foreach ($result as $news) {
//            $tag = Tags::where('id', $news->tags_id)->get();
//            $category = Category::where('id', $news->category_id)->first();
//            $user = User::where('id', $news->user_id)->first();
//            $news->category_name = $category->category_name;
//            $news->user_name = $user->userName;
//            $news->tag_name = $tag->tag_name;
//        }
        $result = DB::table('news')->leftJoin('users', function ($query) {
            $query->on('news.user_id', '=', 'users.id');
        })->leftJoin('category', function ($query) {
            $query->on('news.category_id', '=', 'category.id');
        })->where('news.id', '=', $newsId)
            ->select('news.*', 'users.userName', 'category.category_name')
            ->first();
        $new = News::where('id', $newsId)->first();
        $result->tags_id = $new->tags_id;
        $result->tag_name = [];
        for ($x = 0; $x < count($new->tags_id); $x++) {
            $tag = Tags::where('id', $new->tags_id[$x])->first();
            array_push($result->tag_name, $tag->tag_name);
        }
        return $result;
    }

    /**
     * Get News By Category
     * @param
     * @return mixed
     */
    public function getNewsByCategory($categoryId)
    {
        $result = News::where('category_id', $categoryId)->orderBy('id', 'DESC')->get();
        $category = Category::where('id', $categoryId)->first();
        foreach ($result as $news) {
            $news->category_name = $category->category_name;
        }
        return $result;
    }

    /**
     * @param $tagId
     * @return mixed
     */
    public function getNewsByTag($tagId)
    {
//        $tag = implode(',', $tagId);
//        $result = News::where('tags_id', 'in', $tag)->orderBy('id', 'DESC')->first();
//        var_dump($result);
//        exit;
//        $tag = Tags::where('id', $tagId)->first();
//        foreach ($result as $news) {
//            $news->tag_name = $tag->tag_name;
//        }
        $result = [];
        $tag = Tags::where('id', $tagId)->first();
        $news = News::get();
        foreach ($news as $new) {
            if (in_array($tagId, $new->tags_id)) {
                $new->tag_name = $tag->tag_name;
                array_push($result, $new);
            }
        }
        return $result;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getNews()
    {
        $result = DB::table('news')->orderBy('created_at', 'DESC')->get();
        foreach ($result as $news) {
            $category = Category::where('id', $news->category_id)->first();
            $news->category_name = $category->category_name;
        }
        return $result;
    }

    /**
     * @param $attribute
     * @return \Illuminate\Support\Collection
     */
    public function searchNews($attribute)
    {
        $result = DB::table('news')->where('title', 'like', '%' . $attribute . '%')->orWhere('short_intro', 'like', '%' . $attribute . '%')->orderBy('created_at', 'DESC')->get();
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
    public function getNewsEachCategory()
    {
        $listCategory = DB::table('category')->orderBy('created_at', 'ASC')->limit(8)->get();
        $listNews = [];
        foreach ($listCategory as $category) {
            $result = News::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();
            for ($i = 0; $i < 3; $i++) {
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
    public function createNews($attribute = [])
    {
        return $this->create($attribute);
    }

    /** Update news
     * @param array $attribute
     * @param $newsId
     * @return mixed
     */
    public function updateNews($attribute = [], $newsId)
    {
        $News = News::where('id', $newsId)->update($attribute);
        return $News;
    }

    /** Delete News
     * @param $newsId
     * @return boolean
     */
    public function deleteNews($newsId)
    {
        News::where('id', $newsId)->delete();
        return self::delete($newsId);
    }

    /**
     * @param array $attribute
     * @return array
     */
    public function upload($attribute = [])
    {
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
