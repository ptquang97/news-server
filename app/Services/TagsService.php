<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 04-11-2019
 * Time: 22:33
 */

namespace App\Services;

use App\Tags;
use Illuminate\Support\Facades\DB;

class TagsService extends BaseService {

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
        return Tags::class;
    }

    /**
     * Get Tag
     * @param
     * @return mixed
     */
    public function getTags() {
        $result = DB::table('tags')->get();
        return $result;
    }

    /**
     * Create Tag
     * @param array $attribute
     * @return mixed
     */
    public function createTag($attribute = []) {
        return $this->create($attribute);
    }

    /** Update Tag
     * @param array $attribute
     * @param $tagId
     * @return mixed
     */
    public function updateTag($attribute = []) {
        $Tag = Tags::where('id', $attribute['id'])->update($attribute);
        return $Tag;
    }

    /** Delete Tag
     * @param $tagId
     * @return boolean
     */
    public function deleteTag($tagId) {
        return self::delete($tagId);
    }

}
