<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\TagRequest;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Log;

class TagService
{

    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getList()
    {
        $tags = $this->tagRepository->all();
        return [
            'tags' => $tags
        ];
    }

    public function create(TagRequest $request)
    {
        $data = $request->only('name', 'slugs', 'color', 'status');
        return $this->tagRepository->create($data);
    }

    public function getById($id)
    {
        $tag = $this->tagRepository->getById($id);
        return [
            'tag' => $tag
        ];
    }

    public function update(TagRequest $request, $id)
    {
        $data = $request->only('name', 'slugs', 'color', 'status');
        return $this->tagRepository->updateById($id, $data);
    }

    public function delete($id)
    {
        return $this->tagRepository->deleteById($id);
    }
}
