<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Api;
use App\Services\CommentService;
class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getComment($newsId)
    {
        $result = $this->commentService->getComment($newsId);
        if ($result) {
            return Api::r_response($result, "Get Comment success", 'S200');
        }
        return Api::r_response("", "Server error", 'E500');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function createComment(Request $request)
    {
        $result = $this->commentService->createComment($request->all());
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
    public function updateComment(Request $request, $id)
    {
        $result = $this->commentService->updateComment($request->all(), $id);
        if ($result) {
            return Api::r_response("", 'Edit Comment success', 'S204');
        }
        return Api::r_response("", 'Server error', 'E500');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteComment($id)
    {
        if ($this->commentService->deleteComment($id)) {
            return Api::r_response("", "Delete success", "S204");
        }
        return Api::r_response("", "Server error", "E500");
    }
}
