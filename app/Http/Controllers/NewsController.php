<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function top()
    {
        $news = News::orderBy('created_at', 'desc')->take(3)->get();

        return view('welcome', compact('news'));
    }

    public function upvote(Request $request, $id)
    {
        $item = News::find($id);

        $item->num_upvotes = $item->num_upvotes + 1;

        $item->save();

        return back();
    }

    public function downvote(Request $request, $id)
    {
        $item = News::find($id);

        // dd($item);
        $item->num_upvotes = $item->num_upvotes - 1;

        $item->save();

        return back();
    }

    public function post(Request $request, News $post)
    {
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();

        return view('comments', compact(['post', 'comments']));
    }

    public function create()
    {
        return view('newpost');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'news_title' => 'required|min:10',
            'news_link' => 'required|url'
        ]);

        News::create($request->all());

        return redirect('/');
    }

    public function edit(Request $request, News $post)
    {
        return view('editpost', compact('post'));
    }

    public function update(Request $request, News $post)
    {
        $this->validate($request, [
            'news_title' => 'required|min:10',
            'news_link' => 'required|url'
        ]);

        $data = $request->all();

        $post->news_title = $data['news_title'];
        $post->news_link = $data['news_link'];
        $post->news_description = $data['news_description'];

        $post->save();

        return redirect('/news/' . $post->id);
    }

    public function delete(Request $request, News $post)
    {
        $post->delete();

        return redirect('/');
    }

    public function discussed()
    {
        $most_voted = News::orderBy('num_upvotes', 'desc')->take(2)->get();

        return view('mostvoted', compact('most_voted'));
    }
}
