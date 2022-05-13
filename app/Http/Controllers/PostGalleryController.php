<?php

namespace App\Http\Controllers;

use App\Models\postGallery;
use App\Http\Requests\StorepostGalleryRequest;
use App\Http\Requests\UpdatepostGalleryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepostGalleryRequest $request)
    {
//        return $request;
        if($request->hasFile("postGalleries")){
            foreach ($request->file("postGalleries") as $file){
                $newName = "postGalleries_".uniqid().".".$file->extension();

                $file->storeAs("public/postGalleries",$newName);
                $postGallery = new postGallery();
                $postGallery->post_id = $request->post_id;
                $postGallery->photo = $newName;
                $postGallery->user_id = Auth::id();
                $postGallery->save();
            }
            return redirect()->to(url()->previous()."#postGallery_store")->with("status","Create Successfuly");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postGallery  $postGallery
     * @return \Illuminate\Http\Response
     */
    public function show(postGallery $postGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postGallery  $postGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(postGallery $postGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostGalleryRequest  $request
     * @param  \App\Models\postGallery  $postGallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepostGalleryRequest $request, postGallery $postGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postGallery  $postGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(postGallery $postGallery)
    {
        Gate::authorize('delete',$postGallery);
        Storage::delete('public/postGalleries'.$postGallery->photo);
        $postGallery->delete();
        return redirect()->to(url()->previous()."#postGallery_store")->with("status","Deleted");
    }
}
