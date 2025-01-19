<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(5);
        $view = view('admin.content.comment.index', compact('comments'));

        // Update comment status
        $comments = Comment::where('status', '0')->get();
        foreach($comments as $comment) {
            $comment->status = 1;
            $comment->save();
        }

        return $view;
    }

    // Approve or Reject comment
    public function approved(Comment $comment)
    {
        if($comment->status == 1) {
            $comment->status = 2;

        } elseif($comment->status == 2) {
            $comment->status = 1;
        }
        
        $comment->save();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comments = $comment->children()->get();
        return view('admin.content.comment.show', compact('comments', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
