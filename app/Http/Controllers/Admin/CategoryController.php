<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $data = $this->categoryService->getList($request);
        return view('admin.category.index', $data);
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $this->categoryService->create($request);
            return redirect()->back()->with('success', 'Tạo danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }

    public function edit($id)
    {
        $data = $this->categoryService->getCategoryById($id);
        return view('admin.category.edit', $data);
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->categoryService->update($request, $id);
            return redirect()->back()->with('success', 'Cập nhật danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryService->delete($id);
            return redirect()->back()->with('success', 'Xóa danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
