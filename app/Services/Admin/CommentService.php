<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Log;

class CommentService
{
    protected $commentRepository;

    public function __construct(
        CommentRepository $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
    }

    public function hiddenComment(CommentRequest $request, string $id)
    {
        $data = $request->validated();
        Log::info("body", $data);
        return $this->commentRepository->updateById($id, $data);
    }

    public function deleteComment(string $id)
    {
        return $this->commentRepository->deleteById($id);
    }
}
