<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeFormRequest;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;


class AttProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $color = ProductColor::all();
        $size = ProductSize::all();
        return view('admin.product.AttributeView',compact('color','size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.product.AttributeFormView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AttributeFormRequest $request
     * @return RedirectResponse
     */
    public function store(AttributeFormRequest $request)
    {
//        dd($request->input());
        try {
            if ($request->attribute === 'size') {
                ProductSize::create([
                    'name' => Str::upper($request->attribute_size),
                    'value' => Str::lower($request->attribute_size),
                    'slug' => $request->size_slug,
                ]);
            } elseif ($request->attribute === 'color') {
                ProductColor::create([
                    'name' => Str::ucfirst($request->attribute_color_name),
                    'value' => $request->attribute_color_value,
                    'slug' => $request->color_slug
                ]);
            }
            Session::flash('success', 'Thêm mới sản phẩm thành công thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm lỗi, vui lòng thử lại');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id, Request $request)
    {
        try {
            if ($request->attribute === 'size') {
                ProductSize::where('id',$id)->delete();

            } elseif ($request->attribute === 'color') {
                ProductColor::where('id',$id)->delete();
            }
            return redirect()->route('admin.attribute.index')->with('success','Đã xóa danh mục thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.attribute.index')->with('error','Đã xóa danh mục thành công');
        }


    }
}
