<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Requests\News\CreateNewsRequest;
use App\Notifications\TextSchedule;
use Notification;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'store']);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index')->with('news', News::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('news.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $image = $request->image->store('news');
        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'category_id' => $request->category_id
        ]);

        session()->flash('success', 'News Create Successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show')->withNews($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::orderBy('name')->get();
        return view('news.edit')->withNews($news)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewsRequest $request, News $news)
    {
        $data = $request->only(['title', 'description', 'category_id']);

        if ($request->hasFile('image')) {
            $image = $request->image->store('news');
            $news->deleteImage();
            $data['image'] = $image;
        }

        $news->update($data);
        session()->flash('success', 'News updated successfully.');
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->deleteImage();
        $news->delete();

        session()->flash('success', 'News deleted successfully.');
        return redirect(route('news.index'));
    }
}
