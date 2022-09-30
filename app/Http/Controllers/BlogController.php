<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all()->where('published', true);
        return view('blog.index', ['blogs' => $blogs, 'header' => 'Blogs Feed']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //unique:table,column
            "title" => "required|min:5",
            "body" => "required|min:15",
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title ?? '';
        $blog->published = $request->has('publish') ?? false; // The key will be available in request when checkbox is checked
        $blog->body = $request->body;
        $blog->user_id = Auth::id();
        
        if($blog->save()){
            return redirect('/my-blog')->with('success', 'Blog has been published successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $comments = $blog->comments()->orderBy('id', 'DESC')->paginate(3);
        return view('blog.show', ['blog' => $blog, 'comments' => $comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function my_blogs()
    {
        $blogs = Auth::user()->blogs;
        return view('blog.index', ['blogs' => $blogs, 'header' => 'Your Blogs']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->published = $request->has('publish') ?? false;
        $blog->body = $request->body;

        if($blog->save()){
            return redirect('/my-blog')->with(['success' => 'Updated successfully!']);
        }

    }

    public function comment(Request $request, Blog $blog)
    {
       $blog->comments()->create([
           'body' => $request->body,
           'user_id' => Auth::user()->id
       ]);

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with(['success' => 'Deleted successfully!']);
    }
}
