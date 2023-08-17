<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesFormRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Services\Admin\Category\CategoryService;

class CategoriesController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $category = $this->categoryService->getCategory();
        $recursiveCategories = $this->categoryService->recursiveCategories();
        return view('admin.category.CategoryView',compact('category','recursiveCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = 'Thêm danh mục';
        $optionCategories = $this->categoryService->recursiveCategories();
        return view('admin.category.CategoryFormView', compact('title','optionCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesFormRequest $request
     * @return RedirectResponse
     */
    public function store(CategoriesFormRequest $request)
    {
        $this->categoryService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $title = 'Sửa danh mục';
        $category= $this->categoryService->getCategory($id);
        $optionCategories = $this->categoryService->recursiveCategories();
        $nonSelect = $this->categoryService->getChildCategories(Categories::get(), $id);
        return view('admin.category.CategoryFormView',compact('title','category','optionCategories','nonSelect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesFormRequest $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(CategoriesFormRequest $request, $id): RedirectResponse
    {
        $this->categoryService->update($request, $id);
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            Categories::where('id',$id)->orWhere('parent_id',$id)->delete();
            return redirect()->route('admin.category.index')->with('success','Đã xóa danh mục thành công');
        }catch (\Exception $e){
            return redirect()->route('admin.category.index')->with('error','Lỗi');
        }
    }
}
