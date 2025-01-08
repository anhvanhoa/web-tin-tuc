<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getList(Request $request)
    {
        $limit = $request->query('limit', 10);
        $categories = $this->categoryRepository->paginate($limit);
        return [
            'categories' => $categories
        ];
    }

    public function getCategoryById(string $id)
    {
        $category = $this->categoryRepository->getById($id);
        return [
            'category' => $category
        ];
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->only(['name', 'slugs', 'status']);
        return $this->categoryRepository->create($data);
    }

    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->only(['name', 'slugs', 'status']);
        return $this->categoryRepository->updateById($id, $data);
    }

    public function delete(string $id)
    {
        return $this->categoryRepository->deleteById($id);
    }
}
