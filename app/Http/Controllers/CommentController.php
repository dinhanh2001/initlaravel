<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Response;

class CommentController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->comment_content)){
           return back();
        }else{
            $comment = Comment::create($request->all());
            return redirect()->route('user.recipe.show',$comment->comment_recipes_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if(empty($request->comment_content))
        {
            return Response::json([
                'message' => null,
                'data' => null,
                'error' => 'Nội dung không được bỏ trống'
            ], 401);
        }
        else
        {
            if($comment->isMine())
            {
                $comment->update($request->only('comment_content'));
                return Response::json([
                    'message' => 'Chỉnh sửa thành công',
                    'data' => $comment->comment_content,
                    'error' => null
                ], 200); 
            }
            else
            {
                return Response::json([
                    'message' => null,
                    'data' => null,
                    'error' => 'Bình luận không thuộc sở hữu'
                ], 401);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->isMine())
        {
            $comment->delete();
            return Response::json([
                'message' => 'Xóa thành công',
                'data' => null,
                'error' => null
            ], 200); 
        }
        else
        {
            return Response::json([
                'message' => null,
                'data' => null,
                'error' => 'Bình luận không thuộc sở hữu'
            ], 401);
        }
    }
}
