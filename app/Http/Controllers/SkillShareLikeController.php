<?php

namespace App\Http\Controllers;

use App\Models\skillShareLike;
use App\Http\Requests\StoreskillShareLikeRequest;
use App\Http\Requests\UpdateskillShareLikeRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SkillShareLikeController extends Controller
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
     * @param  \App\Http\Requests\StoreskillShareLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreskillShareLikeRequest $request)
    {

        //        return $request;
        $request->validate([
            "user_id" =>"required|unique:skill_share_likes,user_id",
        ]);
//        id 	share_skills_id 	comment 	like 	share 	created_at 	updated_at
        $skillShareLike = new skillShareLike();
        $skillShareLike->user_id = $request->user_id;
        $skillShareLike->share_skills_id = $request->share_skills_id;
        $skillShareLike->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skillShareLike  $skillShareLike
     * @return \Illuminate\Http\Response
     */
    public function show(skillShareLike $skillShareLike)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skillShareLike  $skillShareLike
     * @return \Illuminate\Http\Response
     */
    public function edit(skillShareLike $skillShareLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateskillShareLikeRequest  $request
     * @param  \App\Models\skillShareLike  $skillShareLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateskillShareLikeRequest $request, skillShareLike $skillShareLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skillShareLike  $skillShareLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(skillShareLike $skillShareLike)
    {
        //
    }
}
