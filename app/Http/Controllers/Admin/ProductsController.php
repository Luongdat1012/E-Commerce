<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Category\CategoryService;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\ProductColor;
use App\Models\Products;
use App\Models\ProductSize;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Admin\ProductFormRequest;

class ProductsController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $product = Products::get();

        return view('admin.product.ProductView', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $optionCategories = $this->categoryService->recursiveCategories();
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view('admin.product.ProductFormView', compact('optionCategories', 'color', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductFormRequest $request
     * @return RedirectResponse
     */
    public function store(ProductFormRequest $request)
    {
        $this->productService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $productService = $this->productService;
        $optionCategories = $this->categoryService->recursiveCategories();
        $color = ProductColor::all();
        $size = ProductSize::all();
        $category = $this->categoryService->getCategory(Products::find($id)->first()->category_id);
        $nonSelect = $this->categoryService->getChildCategories(Categories::get(), Products::find($id)->first()->category_id);
        return view('admin.product.ProductFormView', compact('optionCategories', 'color', 'size', 'product', 'category', 'nonSelect', 'productService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductFormRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductFormRequest $request, $id)
    {
        $this->productService->update($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->back();
    }

}
