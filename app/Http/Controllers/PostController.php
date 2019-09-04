<?php
namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the posts int it from the database
        $posts=Post::orderBy('id', 'asc')->paginate(5);
        //return a view and pass in the above variable 
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        //validate the date
        $this->validate($request, array(
           'title' => 'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255||unique:posts,slug',
            'category_id'=>'required|integer',
            'body' => 'required',
            'image'=>'sometimes|image|'
        ));
        
        //store in the database
        $post = new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=Purifier::clean($request->body);
        
        //save images
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension(); //формати зображень
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image= $filename;
        }
        $post->save();
        $post->tags()->sync($request->tags, false);
        //session
        Session::flash('success','Successfully save!');
        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        //find the post in the database and save as a variable
         $post = Post::find($id);
         $categories=Category::all();
         $cats=array();
         foreach ($categories as $category){
             $cats[$category->id]=$category->name;
         }
         $tags=Tag::all();
         $tags2 = array();
         foreach ($tags as $tag) {
             $tags2[$tag->id]=$tag->name;
         }
         
         
        //return the view and pass in the var we previously created 
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the date
        $post=Post::find($id);
        if($request->input('slug')==$post->slug){
             $this->validate($request, array(
           'title' => 'required|max:255',
            'category_id'=>'required|integer',
            'body' => 'required',
            'image'=>'image'
        ));
        }else {
        $this->validate($request, array(
           'title' => 'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body' => 'required'
        ));
        }
      
        //save the date to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));
        //save images
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension(); //формати зображень
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
  
            $oldFilename = $post->image;
             //update database
            $post->image= $filename;
            //delete the old image
            Storage::delete($oldFilename);       

        }
        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }
         
        //set flash data with success message
        Session::flash('success', 'Successfully update!');
        //redirect with flash date to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success', 'Successfully deleted');
        return redirect()->route('posts.index');
    }
}
