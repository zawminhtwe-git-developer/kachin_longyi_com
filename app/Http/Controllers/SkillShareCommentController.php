<?php

namespace App\Http\Controllers;

use App\Models\SkillShareComment;
use App\Http\Requests\StoreSkillShareCommentRequest;
use App\Http\Requests\UpdateSkillShareCommentRequest;

class SkillShareCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Http\Requests\StoreSkillShareCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkillShareCommentRequest $request)
    {
//        return $request;
        $request->validate([
            "comment"=>"required|max:255"
        ]);
//        id 	share_skills_id 	comment 	like 	share 	created_at 	updated_at
        $skillShareComment = new SkillShareComment();
        $skillShareComment->user_id = $request->user_id;
        $skillShareComment->share_skills_id = $request->share_skills_id;
        $skillShareComment->comment = $request->comment;
        $skillShareComment->save();
        return redirect()->to(url()->previous()."#shareSkill".$request->share_skills_id)->with("status","Commented");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkillShareComment  $skillShareComment
     * @return \Illuminate\Http\Response
     */
    public function show(SkillShareComment $skillShareComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkillShareComment  $skillShareComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillShareComment $skillShareComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkillShareCommentRequest  $request
     * @param  \App\Models\SkillShareComment  $skillShareComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillShareCommentRequest $request, SkillShareComment $skillShareComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkillShareComment  $skillShareComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillShareComment $skillShareComment)
    {
        //
    }
}
