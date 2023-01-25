<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin.category.index', $result);
    }

    public function add(Request $request)
    {
        $result['category'] = DB::table('categories')->where(['status' => 1])->get();
        return view('admin.category.add', $result);
    }




    public function addnow(Request $request)

    {
        // return $request->post();

        $request->validate([
            'category_name' => 'required',
            'category_image' => 'mimes:jpeg,jpg,png,webp',
            'category_slug' => 'required|unique:categories',
        ]);

        $model = new Category();
        $image = $request->file('category_image');
        $ext = $image->extension();
        $image_name = time() . '.' . $ext;
        $image->storeAs('/public/media/category', $image_name);
        $model->category_image = $image_name;
        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->parent_category_id = $request->post('parent_category_id');
        $model->is_home = 0;
        if ($request->post('is_home') !== null) {
            $model->is_home = 1;
        }
        $model->status = 1;
        $model->save();

        session()->flash('message', 'Category Inserted');
        return redirect('admin/category');
    }
    public function edit(Request $request, $id = '')
    {
        $arr = Category::where(['id' => $id])->get();
        $result['category_name'] = $arr['0']->category_name;
        $result['category_slug'] = $arr['0']->category_slug;
        $result['parent_category_id'] = $arr['0']->parent_category_id;
        $result['category_image'] = $arr['0']->category_image;
        $result['is_home'] = $arr['0']->is_home;
        $result['is_home_selected'] = "";
        if ($arr['0']->is_home == 1) {
            $result['is_home_selected'] = "checked";
        }
        $result['id'] = $arr['0']->id;
        $result['category'] = DB::table('categories')->where(['status' => 1])->where('id', '!=', $id)->get();
        return view('admin.category.edit', $result);
    }

    public function editnow(Request $request)
    {

        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories,category_slug,' . $request->post('id'),
            'category_image' => 'mimes:jpeg,jpg,png,webp',
        ]);
        $model = Category::find($request->post('id'));
        if ($request->hasfile('category_image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('categories')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/public/media/category/' . $arrImage[0]->category_image)) {
                    Storage::delete('/public/media/category/' . $arrImage[0]->category_image);
                }
            }

            $image = $request->file('category_image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/category', $image_name);
            $model->category_image = $image_name;
        }
        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->parent_category_id = $request->post('parent_category_id');
        $model->is_home = 0;
        if ($request->post('is_home') !== null) {
            $model->is_home = 1;
        }
        $model->status = 1;
        $model->save();

        session()->flash('message', 'Category Updated');
        return redirect('admin/category');
    }
    public function delete(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();
        session()->flash('message', 'Category Deleted');
        return redirect('admin/category');
    }
    public function status(Request $request,$status,$id){
        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category Status updated');
        return redirect('admin/category');
    }
}
