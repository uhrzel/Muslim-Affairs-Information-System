<?php

namespace App\Http\Controllers;

use App\Models\News;
use DateTime;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view("admin.news.index", compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'newsContent' => 'required|string',
            'newsImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'newsDate' => 'required|date_format:Y-m-d', // Adjust the date format as needed
            'newsTime' => 'required|date_format:H:i',
        ]);

        // Handle file upload
        if ($request->hasFile('newsImage')) {
            $image = $request->file('newsImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('news_images', $imageName, 'public'); // Assuming you have a 'news_images' directory in your storage/public directory
        } else {
            $imagePath = null;
        }

        // Create News record in the database
        News::create([
            'news_title' => $request->input('title'),
            'news_content' => $request->input('newsContent'),
            'news_image' => $imagePath,
            'news_date' => $request->input('newsDate'),
            'news_time' => $request->input('newsTime'),
        ]);

        return redirect()->route("admin.news")->with("success", "News created successfully.");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view("admin.news.show", compact("news"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view("admin.news.edit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->update($request->all());
        return redirect()->route("admin.news")->with("success", "News updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route("admin.news")->with("success", "News deleted successfully.");
    }
}
