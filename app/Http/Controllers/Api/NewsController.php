<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Api;
use App\Services\NewsService;
use phpDocumentor\Reflection\File;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService) {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $newsId
     * @return \Illuminate\Http\Response
     */
    public function getNewsInfo($newsId)
    {
        $result = $this->newsService->getNewsInfo($newsId);
        if ($result) {
            return Api::r_response($result, "Get Info success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createNews(Request $request)
    {
        $result = $this->newsService->createNews($request->all());
        if ($result) {
            return Api::r_response($result, "Create success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateNews(Request $request, $newsId)
    {
        $result = $this->newsService->updateNews($request->all(), $newsId);
        if ($result) {
            return Api::r_response("", 'Edit News success', 'S204');
        }
        return Api::r_response("", 'Server error', 'E500');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNews($id)
    {
        if ($this->newsService->deleteNews($id)) {
            return Api::r_response("", "Delete success", "S204");
        }
        return Api::r_response("", "Server error", "E500");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request)
    {
        $path = [];
        foreach ($request->allFiles() as $photo) {
            $filename = $photo->storeAs('photos', $photo->getClientOriginalName());
            array_push($path,$filename);
        }
        return Api::r_response($path, "Upload success", "S204");

    }

    /**
     * @param $categoryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNewsByCategory($categoryId)
    {
        $result = $this->newsService->getNewsByCategory($categoryId);
        if ($result) {
            return Api::r_response($result, "Get News success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * @param $tagId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNewsByTag($tagId)
    {
        $result = $this->newsService->getNewsByTag($tagId);
        if ($result) {
            return Api::r_response($result, "Get News success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNews()
    {
        $result = $this->newsService->getNews();
        if ($result) {
            return Api::r_response($result, "Get News success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchNews($request)
    {
        $result = $this->newsService->searchNews($request);
        if ($result) {
            return Api::r_response($result, "Get News success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNewsEachCategory()
    {
        $result = $this->newsService->getNewsEachCategory();
        if ($result) {
            return Api::r_response($result, "Get News success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

}
