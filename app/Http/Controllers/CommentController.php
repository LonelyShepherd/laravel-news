<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $post)
    {
        $data = $this->validate($request, [
            'username' => 'required',
            'comment_text' => 'required'
        ]);

        $post->comments()->save(new Comment($data));

        return redirect('/news/' . $post->id);
    }
}
