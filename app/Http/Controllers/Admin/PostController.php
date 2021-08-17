<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Post;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;
class PostController extends Controller
{
    // errore personalizazto da mettere nel validate come secondo argomento
    // private $errore= [
    //     'title.required' =>'errore personalizzato'
    // ];
    
    private $validation = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category_id'=> 'nullable|exists:categories,id',
        'tags'=>'exists:tags,id',
        'cover'=>'nullable|mimes:jpg,jpeg|max:2048'
        // 'cover' => 'nullable|image|max:2048'
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
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
        // dd($data);
        $request->validate($this->validation); 
        // $this->messaggi da mettere nel validate per errore personalizzato
        $post = new Post();
        // $post->fill($data);
        
        $slug = $this->generateSlug($data);
        $data['slug'] = $slug;

        if(array_key_exists('cover',$data)){
            // $post->cover = Storage::put('post_covers',$data['cover']);
  
            $data["cover"] = Storage::put('post_covers', $data["cover"]);

        };

        
        $post->fill($data);
       
        // $post->slug = Str::slug($data['title'],'-');
        
        
        $post->save();

        
        if (array_key_exists('tags',$data)) {
            $post->tags()->attach($data["tags"]);
        };

        return redirect()->route('admin.posts.show' , $post->id)->with('message', "Post creato!");
        
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

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
        
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
        $request->validate($this->validation);
        $slug = $this->generateSlug($data);
       
        $data['slug'] = $slug;


        if(array_key_exists('cover', $data)){
            if($post->cover){
                Storage::delete($post->cover);
            }
            $data['cover'] = Storage::put('post_covers',$data['cover']);
            
        }

        $post->update($data);
        
        if (array_key_exists('tags',$data)) {
            $post->tags()->sync($data["tags"]);
        }else {
            $post->tags()->detach();
        }

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
        if($post->cover){
            Storage::delete($post->cover);
            
        }


        $post->delete();
        
        return redirect()
        ->route('admin.posts.index')
        ->with('deleted', $post->slug);
    }
}
