<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Api;
use App\Services\CategoryService;
class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory()
    {
        $result = $this->categoryService->getCategory();
        if ($result) {
            return Api::r_response($result, "Get Category success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createCategory(Request $request)
    {
        $result = $this->categoryService->createCategory($request->all());
        if ($result) {
            return Api::r_response($result, "Create success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        $result = $this->categoryService->updateCategory($request->all(), $id);
        if ($result) {
            return Api::r_response("", 'Edit Category success', 'S204');
        }
        return Api::r_response("", 'Server error', 'E500');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        if ($this->categoryService->deleteCategory($id)) {
            return Api::r_response("", "Delete success", "S204");
        }
        return Api::r_response("", "Server error", "E500");
    }
}
