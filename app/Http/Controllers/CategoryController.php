<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function create()
    {
        // de qui san pham
        $htmlOption = $this->getCategory($parentId='');

        return view('admin.category.add', compact('htmlOption'));
    }

    public function index()
    {
        # code...
        $categories = $this->category->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        # code...
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() ->route('categories.index');
    }
    public function getCategory(){
        $data = $this->category->all();
        $recusive = new Recusive();
        $htmlOption = $recusive->categoryRecusive();
        return $htmlOption;
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));
    }
    
    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        
        return redirect() ->route('categories.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect() ->route('categories.index');
    }
}