<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Api;
use App\Services\TagsService;
class TagsController extends Controller
{
    protected $tagsService;

    public function __construct(TagsService $tagsService) {
        $this->tagsService = $tagsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTags()
    {
        $result = $this->tagsService->getTags();
        if ($result) {
            return Api::r_response($result, "Get Tags success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createTag(Request $request)
    {
        $result = $this->tagsService->createTag($request->all());
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
    public function updateTag(Request $request)
    {
        $result = $this->tagsService->updateTag($request->all());
        if ($result) {
            return Api::r_response("", 'Edit Tag success', 'S204');
        }
        return Api::r_response("", 'Server error', 'E500');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTag($id)
    {
        if ($this->tagsService->deleteTag($id)) {
            return Api::r_response("", "Delete success", "S204");
        }
        return Api::r_response("", "Server error", "E500");
    }
}
