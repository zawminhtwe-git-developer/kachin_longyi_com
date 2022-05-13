<?php

namespace App\Http\Controllers;

use App\Models\ShareSkill;
use App\Http\Requests\StoreShareSkillRequest;
use App\Http\Requests\UpdateShareSkillRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShareSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shareSkills = ShareSkill::all();
//        return $shareSkill;
        return view("skill-shares.index",compact("shareSkills"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill-shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShareSkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShareSkillRequest $request)
    {
        $request->validate([
            "description"=>"required",

        ]);
        $ShareSkill = new ShareSkill();
        $ShareSkill->description = $request->description;
        $ShareSkill->user_id = Auth::id();
        $ShareSkill->save();
        return redirect()->route('shareSkill.index')->with("status",['icon'=>'success','title'=>'Share Skill has created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShareSkill  $shareSkill
     * @return \Illuminate\Http\Response
     */
    public function show(ShareSkill $shareSkill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShareSkill  $shareSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareSkill $shareSkill)
    {
//        return $shareSkill;
        return view("skill-shares.edit",compact("shareSkill"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShareSkillRequest  $request
     * @param  \App\Models\ShareSkill  $shareSkill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShareSkillRequest $request, ShareSkill $shareSkill)
    {
        $request->validate([
            "description"=>"nullable",

        ]);
        $shareSkill->description = $request->description;
        $shareSkill->update();
        return redirect()->route('shareSkill.index')->with("status",['icon'=>'success','title'=>'Share Skill has updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShareSkill  $shareSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareSkill $shareSkill)
    {
//         return $shareSkill->skillShareComments;
        $shareSkill->skillShareComments()->delete();
        $shareSkill->delete();
        return redirect()->back();
    }
}
