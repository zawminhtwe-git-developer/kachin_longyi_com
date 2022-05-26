<?php

namespace App\Http\Controllers;

use App\Models\AboutZawMinHtwe;
use App\Http\Requests\StoreAboutZawMinHtweRequest;
use App\Http\Requests\UpdateAboutZawMinHtweRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AboutZawMinHtweController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
//        $aboutZawMinHtwes = AboutZawMinHtwe::all()->sortByDesc("created_date");
        $aboutZawMinHtwes = AboutZawMinHtwe::latest("id")->paginate(5);
//        return $aboutZawMinHtwes;
        return view("abouts.zawminhtwe.index", compact('aboutZawMinHtwes'));
    }


    public function detail($slug)
    {
//        $post = AboutZawMinHtwe::where("slug",$slug)->first();
        $aboutZawMinHtwe = AboutZawMinHtwe::where("slug", $slug)->firstOrFail();
//        return $aboutZawMinHtwe;
//        if(empty($post)){
//            return "Ma shi Bu";
//        }
        return view("abouts.zawminhtwe.detail", compact("aboutZawMinHtwe"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("abouts.zawminhtwe.create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAboutZawMinHtweRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutZawMinHtweRequest $request)
    {
        //return $request;
        $request->validate([
            "title" => "required|unique:about_zaw_min_htwes,title|min:5",
            "description" => "required|min:15",
            "cover" => "required|file|mimes:jpeg,png|max:5120"
        ]);

        $newName = "cover_" . uniqid() . "_" . $request->file('cover')->extension();
        $request->file('cover')->storeAs("public/cover", $newName);

        $about_zaw_min_htwe = new AboutZawMinHtwe();
        $about_zaw_min_htwe->title = $request->title;
        $about_zaw_min_htwe->slug = Str::slug($request->title);
        $about_zaw_min_htwe->description = $request->description;
        $about_zaw_min_htwe->excerpt = Str::words($request->description, 50);
        $about_zaw_min_htwe->cover = $newName;
        $about_zaw_min_htwe->user_id = Auth::id();
        $about_zaw_min_htwe->save();


        return redirect()->back()->with("status", ['icon'=>'success','title'=>'Your Post Have Uploaded']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\AboutZawMinHtwe $aboutZawMinHtwe
     * @return \Illuminate\Http\Response
     */
    public function show(AboutZawMinHtwe $aboutZawMinHtwe)
    {
        return $aboutZawMinHtwe;
        return view("abouts.zawminhtwe.detail", compact("aboutZawMinHtwe"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AboutZawMinHtwe $aboutZawMinHtwe
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutZawMinHtwe $aboutZawMinHtwe)
    {
        Gate::authorize("update",$aboutZawMinHtwe);
        return view("abouts.zawminhtwe.edit",compact("aboutZawMinHtwe"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAboutZawMinHtweRequest $request
     * @param \App\Models\AboutZawMinHtwe $aboutZawMinHtwe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutZawMinHtweRequest $request, AboutZawMinHtwe $aboutZawMinHtwe)
    {
        $request->validate([

        ]);
        $aboutZawMinHtwe->title = $request->title;
        $aboutZawMinHtwe->slug = Str::slug($aboutZawMinHtwe->title);
        $aboutZawMinHtwe->description = $request->description;
        $aboutZawMinHtwe->excerpt = Str::words($request->description,50);

        if($request->hasFile("cover")){
            //delete old data from file
            Storage::delete("public/cover".$aboutZawMinHtwe->cover);

            //upload new cover
            $newName = "cover_" . uniqid() . "_" . $request->file('cover')->extension();
            $request->file('cover')->storeAs("public/cover", $newName);

            //save to table
            $aboutZawMinHtwe->cover =$newName;
        }
        $aboutZawMinHtwe->update();
        return redirect()->route("aboutZawMinHtwe.detail",$aboutZawMinHtwe->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AboutZawMinHtwe $aboutZawMinHtwe
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutZawMinHtwe $aboutZawMinHtwe)
    {
        // policies မှာရေးခဲ့တဲ့ စာကို ပြန်ရေးခြင်းဖြစ်ပါသည်။ ကိုယ့်ပိုစ်မဟုတ််ဘဲ ဝင်ကြည့်လို့မရအောင်ကာထားခြင်းဖြစ်ပါသည်။
        Gate::authorize("delete",$aboutZawMinHtwe);
        //delete old data from file
        Storage::delete("public/cover".$aboutZawMinHtwe->cover);
        $aboutZawMinHtwe->delete();
        return redirect()->route("aboutZawMinHtwe.index");
    }
         public function me(){
             $aboutZawMinHtwes = AboutZawMinHtwe::latest("id")->get();
             return view("abouts.zawminhtwe.zawminhtwe", compact('aboutZawMinHtwes'));
         }


}
