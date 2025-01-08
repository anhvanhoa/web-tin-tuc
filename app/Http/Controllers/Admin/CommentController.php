<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use App\Services\Admin\CommentService;

class CommentController extends Controller
{

    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function update(CommentRequest $request, string $id)
    {
        try {
            $this->commentService->hiddenComment($request, $id);
            return redirect()->back()->with('success', 'Cập nhật bình luận thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->commentService->deleteComment($id);
            return redirect()->back()->with('success', 'Xóa bình luận thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
