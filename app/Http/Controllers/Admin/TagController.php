<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Services\Admin\TagService;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $data = $this->tagService->getList();
        return view('admin.tag.index', $data);
    }

    public function create()
    {
        return view('admin.tag.add');
    }

    public function store(TagRequest $request)
    {
        try {
            $this->tagService->create($request);
            return redirect()->back()->with('success', 'Tạo tag thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }

    public function edit($id)
    {
        $data = $this->tagService->getById($id);
        return view('admin.tag.edit', $data);
    }

    public function update(TagRequest $request, $id)
    {
        try {
            $this->tagService->update($request, $id);
            return redirect()->back()->with('success', 'Cập nhật tag thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->tagService->delete($id);
            return redirect()->back()->with('success', 'Xóa tag thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
