<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(){
        $blogs = Blog::all();
        return view('admin.blogs.index',get_defined_vars());
    }

    public function create(){
        $blog_categories = BlogCategory::where('status', 1)->get();
        return view('admin.blogs.create',get_defined_vars());
    }

    public function save_blog(Request $request){
        // dd($request->all());

        $attechment  = $request->file('thumbnail');
        $img_2 = time() . $attechment->getClientOriginalName();
        $attechment->move(public_path('assets/images/blog'), $img_2); 

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->blog_details = $request->editor;
        $blog->thumbnail = 'assets/images/blog/'.$img_2;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success','Blog has been published');
    }

    public function edit($id){
        $blog_categories = BlogCategory::where('status', 1)->get();
        $blog_details = Blog::findorfail($id);
        return view('admin.blogs.edit',get_defined_vars());
    }
    
    public function update(Request $request, $id){

        if ($request->hasFile('thumbnail')) {
            $attechment  = $request->file('thumbnail');
            $img_2 =  time() . $attechment->getClientOriginalName();
            $attechment->move(public_path('assets/images/blog'), $img_2); 
        }else{
            $blog_details = Blog::findorfail($id);
            $img_2 = $blog_details->thumbnail;
        }
        Blog::where('id',$id)->update(array(
            'title' => $request->title,
            'category' => $request->category,
            'blog_details' => $request->editor,
            'thumbnail' => 'assets/images/blog/'.$img_2,
        ));

        return redirect()->route('admin.blog.index')->with('success','Blog has been updated');
    }

    public function category_index(){
        $blog_cate = BlogCategory::orderBy('id','desc')->paginate(10);
        return view('admin.blogs.category',get_defined_vars());
    }

    public function category_save(Request $request){
        $blog_categories = new BlogCategory;
        $blog_categories->name = $request->name;
        $blog_categories->save();
        return redirect()->route('admin.blog.category')->with('success','Category has been saved');
    }

    public function category_update(Request $request, $id){
        BlogCategory::where('id', $id)->update(array(
            'name' => $request->name
        ));
        return redirect()->route('admin.blog.category')->with('success','Category has been saved');
    }
}
