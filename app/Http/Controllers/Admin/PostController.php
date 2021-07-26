<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
class PostController extends Controller
{

    private $validation = [
        'title' => 'required|max:255',
        'content' => 'required',
    ];

    private function generateSlug($data) {
        $slug = Str::slug($data["title"], '-'); // titolo-articolo-3

        $existingPost = Post::where('slug', $slug)->first();
        // dd($existingPost);

        $slugBase = $slug;
        $counter = 1;

        while($existingPost) {
            // blocco di istruzioni
            $slug = $slugBase . "-" . $counter;

            // istruzioni per terminare il ciclo
            $existingPost = Post::where('slug', $slug)->first(); // titolo-articolo-3-2
            $counter++;
        }

        return $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate($this->validation);
        $post = new Post();
        // $post->fill($data);
        
        $slug = $this->generateSlug($data);
        $data['slug'] = $slug;
        $post->slug = $data['slug'];
        $post->title = $data['title'];
        $post->content = $data['content'];
        // $post->slug = Str::slug($data['title'],'-');
        
        $post->save();

        return redirect()->route('admin.posts.show' , $post->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $id = Post::find($id);
        return view('admin.posts.show', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      
        $data = $request->all();

        $slug = $this->generateSlug($data);
       
        $data['slug'] = $slug;

        $post->update($data);
       
        return redirect()->route("admin.posts.show",$post)
            ->with('message', "Post '" . " " . $post->title . "' modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()
        ->route('admin.posts.index')
        ->with('deleted', $post->slug);
    }
}