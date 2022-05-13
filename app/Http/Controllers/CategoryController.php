<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Post;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function __construct()
    {
        return $this->middleware("isAdmin")->only(["create","edit","store","delete","üpdate","index"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Gate::authorize('view');
        $categories = Category::all();
        return view("categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        Gate::authorize("create");
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
//        return request()->url();
//        return $request;
        $request->validate([
            "title"=>"required|unique:categories,title|max:25",
            "hover"=>"required"

        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->hover= $request->hover;
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->route('category.index')->with("status","Category Create Successfuly");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("categories.show",compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view('categories.edit',compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
            "title" => "required|unique:categories,title,".$category->id."|min:3"
        ]);

        $category->title = $request->title;
        $category->update();

        return redirect()->route('category.index')->with('status',"Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
//return $category->getOrders;
        if(isset($category->getOrders)){
            $toDelete = $category->getOrders->pluck("id");
            \App\Models\order::destroy($toDelete);
        }
        $category->post()->delete();//relationship table delete
        $category->delete();
        return redirect()->back()->with('status',"Category Deleted");
    }
}
