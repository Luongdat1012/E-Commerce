<?php

namespace App\Http\Services\Admin\Category;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Session;


class CategoryService
{
    public function create($request)
    {
        try {
            $level = ($request->category_parent != 0) ? Categories::find($request->category_parent)->level + 1 : 0;
            Categories::create([
                'category_name' => $request->name,
                'parent_id' => $request->category_parent,
                'level' => $level,
                'slug' => $request->slug
            ]);
            Session::flash('success', 'Thêm mới danh mục thành công');
        } catch (\Exception $e) {
            return $e->getMessage();
            Session::flash('error', $e->getMessage());
        }
        return true;
    }

    public function getCategory($id = '')
    {
        if (!empty($id)) {
            return Categories::find($id);
        }
        return Categories::orderBy('category_name', 'asc')->paginate(30);
    }

    public function recursiveCategories()
    {
        $categories = Categories::orderBy('category_name', 'asc')->get();
        $listCategory = $this->data_tree($categories, 0);
        return $listCategory;

    }

    public function update($request, $id)
    {
        try {
            $categories = Categories::find($id);
            if ($request->category_parent != $categories->id) {
                $categories->parent_id = $request->category_parent;
            }
            $categories->category_name = $request->name;
            $categories->slug = $request->slug;
            $categories->save();

            Session::flash('success', 'Sửa danh mục thành công');
        } catch (\Exception $exception) {
            Session::flash('error', 'Lỗi!!!!');
        }
    }

    public function data_tree($categories, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($categories as $items) {
            if ($items->parent_id == $parent_id) {
                $items['level'] = $level;
                $result[] = $items;
                $child = $this->data_tree($categories, $items->id, $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function getChildCategories($categories, $category_id)
    {
        $result = [];
        foreach ($categories as $items) {
            if ($items->parent_id == $category_id) {
                $result[] = $items->id;
                unset($categories[$category_id]);
                $child = $this->getChildCategories($categories, $items->id);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function getParentId($categories, $category_id){
        $result = [];
        foreach ($categories as $items) {
            if ($items->id == $category_id ) {
                $result[] = $items->id;
                unset($categories[$category_id]);
                $child = $this->getParentId($categories, $items->parent_id);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}
