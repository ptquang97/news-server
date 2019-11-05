<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 04-11-2019
 * Time: 23:50
 */
namespace App\Services;

use App\Comment;
use Illuminate\Support\Facades\DB;

class CommentService extends BaseService {

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
        return Comment::class;
    }

    /**
     * Get Comment
     * @param $newsId
     * @return mixed
     */
    public function getComment($newsId) {
        $result = Comment::where('news_id', $newsId)->get();
        return $result;
    }

    /**
     * Create Comment
     * @param array $attribute
     * @return mixed
     */
    public function createComment($attribute = []) {
        return $this->create($attribute);
    }

    /** Update comment
     * @param array $attribute
     * @param $commentId
     * @return mixed
     */
    public function updateComment($attribute = []) {
        $Comment = Comment::where('id', $attribute['id'])->update($attribute);
        return $Comment;
    }

    /** Delete Comment
     * @param $commentId
     * @return boolean
     */
    public function deleteComment($commentId) {
        return self::delete($commentId);
    }

}
