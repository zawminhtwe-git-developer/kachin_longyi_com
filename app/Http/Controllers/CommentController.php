<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{


    public function __construct()
    {
        $this->middleware("auth")->only(["store","update"]);
    }

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
     * @param \App\Http\Requests\StoreCommentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
            $comment = Comment::create([
                "message"=>$request->message,
                "about_zaw_min_htwe_id"=>$request->aboutZawMinHtwe_id,
                "user_id"=>Auth::id(),
            ]);
            return redirect()->to(url()->previous()."#comment-create")->with("status","Commented");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCommentRequest $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        return abort(404);
//        return abort(404)->with("status","Category Create Successfuly");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize("delete",$comment);
        $comment->delete();
        return redirect()->to(url()->previous()."#comment-create")->with("status","Deleted");
    }
}
