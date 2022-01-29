<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Beranda::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'title' => 'required|max :255',
            'slug' => 'required|unique:berandas',
            'category_id' => 'required',
            'image' =>'image|file|mimes:jpg,png,jpeg|max:4096',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $request->file('image')->store('post-images');

        // $post = new Post;
        // $post['image'] = $path;
        // $post->save();

        // $store = new beranda;
 
        // $store->image = $image;
        // $store->path = $path;
 
        // $store->save();
 

        
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...') ;

        Post::create($validatedData);

        return redirect('/admin/posts')->with('success', 'Post Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $beranda;
        //  echo $id;
        $data['beranda'] = Post::find($id);
        // return $post;
        return view('admin.posts.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
        return view('admin.posts.edit', [
            'beranda' => $post,
            'categories'=> Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max :255',
            'category_id' => 'required',
            'image' =>'image|file|mimes:jpg,png,jpeg|max:4096',
            'body' => 'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:berandas';
        }
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($post->image){
                Storage::delete($post->image);
            // if($request->oldImage){
            //     Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...') ;

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/admin/posts')->with('success', 'Post Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/admin/posts')->with('success', 'Post Telah Dihapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Beranda::class, 'slug', $request->title);
        return response()->json(['slug'=> $slug]);
    }
}
