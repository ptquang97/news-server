<?php
/**
 * Created by PhpStorm.
 * User: ptquang
 * Date: 04-11-2019
 * Time: 23:13
 */
namespace App\Services;

use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryService extends BaseService {

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
        return Category::class;
    }

    /**
     * Get Category
     * @param
     * @return mixed
     */
    public function getCategory() {
        $result = DB::table('category')->orderBy('created_at', 'ASC')->get();
        return $result;
    }

    public function getCategoryInfo($categoryId) {
        $result = Category::where('id', $categoryId)->get();
        return $result;
    }

    /**
     * Create Category
     * @param array $attribute
     * @return mixed
     */
    public function createCategory($attribute = []) {
        return $this->create($attribute);
    }

    /** Update categoryId
     * @param array $attribute
     * @return mixed
     */
    public function updateCategory($attribute) {
        $Category = Category::where('id', $attribute['id'])->update($attribute);
        return $Category;
    }

    /** Delete Category
     * @param $categoryId
     * @return boolean
     */
    public function deleteCategory($categoryId) {
        return self::delete($categoryId);
    }

}
