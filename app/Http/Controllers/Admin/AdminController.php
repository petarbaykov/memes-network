<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Categories;
class AdminController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->middleware('admin');
    }
    public function login(){
        return view('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function categories(){
        $categories = Categories::all();
        $data = [
            'categories'=>$categories,
            'page'=>'admin_categories'
        ];
        return view('admin.categories')->with($data);
    }

    public function editShow($id){
        $category = Categories::find($id);
         $data = [
            'category'=>$category,
            'page'=>'admin_categories'
        ];
        return view('admin.edit-category')->with($data);
    }

    public function update(Request $request,$id){
        $data = $request->all();
        $category = Categories::find($id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        if(isset($_FILES['img'])){
            $category->image = $data['img'];
        }
        $category->save();
        return redirect()->back()->with('msg',['title'=>'Category updated!','body'=>'Category updated successfully!']);
    }

    public function deleteCategory($id){
        $category = Categories::find($id);
        $category->delete();

         return redirect()->back()->with('msg',['title'=>'Category removed!','body'=>'Category removed successfully!']);
    }

    public function addCategory(){

         $data = [
            'page'=>'admin_categories'
        ];
        return view('admin.create-category')->with($data);
    }

    public function postCategory(Request $request){
        $data = $request->all();

         if(isset($_FILES['image'])){
            $location = "categories/". $_FILES['image']['name'];	
            move_uploaded_file($_FILES['image']['tmp_name'],$location);
        }

        $category = new Categories;
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        if(isset($_FILES['image'])){
             $category->image = $_FILES['image']['name'];
        }
       
        $category->save();

       
        return redirect()->back()->with('msg',['title'=>'Category created!','body'=>'Category created successfully!']);;
    }
}
