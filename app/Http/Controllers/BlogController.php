<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class BlogController extends Controller
{

    public function index(){

        $blogs = Blogs::all();
        return view("admin.dashboard", compact("blogs"));

    }
    public function store(Request $request){
        $table =new Blogs;
        $filename = $request->file('image')->getClientOriginalName();

        $table->name = $request->name;
        $table->date = $request->date;
        $table->author = $request->author;
        $table->content = $request->content;
        $table->image = $filename;
        $request->file('image')->move(public_path('assets/images'), $filename);

        $table->save();

        return redirect('admin/dashboard')->with('success','');
        
    }


    public function destroy($id){

        $blog = Blogs::find($id);
        $blog->delete();
        return redirect('../admin/dashboard');  


        // if ($blog !== null) {
        //     $blog->delete();
        // } else {
        //     // Handle the case where the object is null
        //     echo "Object not found.";
        // }
        
        // return response()->json();
    }

    public function show($id) {
        $blog = Blogs::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    public function update_blog(Request $request, $id) {
        $blog = Blogs::find($id);
    
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found.');
        }
    
        // Update blog properties
        $blog->name = $request->name;
        $blog->date = $request->date;
        $blog->author = $request->author;
        $blog->content = $request->content;
    
        // Save the updated blog
        $blog->save();

        return redirect('admin/dashboard');
    }
} 