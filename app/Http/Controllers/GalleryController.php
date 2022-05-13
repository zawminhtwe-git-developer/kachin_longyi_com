<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{


    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreGalleryRequest $request)
    {
        if($request->hasFile("galleries")){
            foreach ($request->file("galleries") as $file){
                $newName = "gallery_".uniqid().".".$file->extension();

                $file->storeAs("public/gallery",$newName);
                $gallery = new Gallery();
                $gallery->about_zaw_min_htwe_id = $request->aboutZawMinHtwe_id;
                $gallery->photo = $newName;
                $gallery->user_id = Auth::id();
                $gallery->save();
            }
            return redirect()->to(url()->previous()."#gallery")->with("status","Create Successfuly");
        }
    }


    public function show(Gallery $gallery)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
        //
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        //
    }

    public function destroy(Gallery $gallery)
    {
        Gate::authorize('delete',$gallery);
        Storage::delete('public/gallery'.$gallery->photo);
        $gallery->delete();
        return redirect()->to(url()->previous()."#gallery")->with("status","Deleted");
    }
}
