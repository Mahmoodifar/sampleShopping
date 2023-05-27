<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use App\Models\Content\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentUnseens = Comment::where('commentable_type', 'App\Models\Content\Post')->where('seen',0)->get();
        foreach($commentUnseens as $commentUnseen)
        {
            $commentUnseen->seen = 1;
            $result = $commentUnseen->save();
        }
        $comments = Comment::where('commentable_type', 'App\Models\Content\Post')->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('Admin.content.comment.index', compact('comments'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('Admin.content.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status(Comment $comment)
    {
        $comment->status = $comment->status == 0 ? 1 : 0;
        $result = $comment->save();

        if ($result) {

            if ($comment->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function approved(Comment $comment)
    {

        $comment->approved = $comment->approved == 0 ? 1 : 0;
        $result = $comment->save();

        if ($result) {

            return redirect()->route('admin.content.comment.index')->with('swal-success', ' وضعیت نظر شما با موفقیت اپدیت شد');
        } else {
            return redirect()->route('admin.content.comment.index')->with('swal-success', ' وضعیت نظر شما با خطا مواجه شد');
        }
    }

    public function answer(CommentRequest $request, Comment $comment)
    {
        if ($comment->parent_id == null) {
            $inputs = $request->all();

            $inputs['author_id'] = 1;
            $inputs['parent_id'] = $comment->id;
            $inputs['commentable_id'] = $comment->commentable_id;
            $inputs['commentable_type'] = $comment->commentable_type;
            $inputs['approved'] = 1;
            $inputs['status'] = 1;

            $comment = Comment::create($inputs);
            return redirect()->route('admin.content.comment.index')->with('swal-success', ' پاسخ شما با موفقیت ثبت شد');
        } else {
            return redirect()->route('admin.content.comment.index')->with('swal-success', ' با خطا مواجه شدید');
        }
    }
}
