<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at','DESC')->paginate(10);
        return view('blog.index',[
            'blogs'=>$blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required'
        ]);

        $data['user_id'] = 1;

        //Imagen
        $imageName = NULL;

        if ($request->banner_image != NULL) {

            $imageObject = $request->banner_image;

            $imageExtension = $imageObject->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;

            $imageObject->move(public_path('images'), $newImageName);

            $imageName = $newImageName;

        }

        $data['banner_image'] = $imageName;

        Blog::create($data);

        return to_route('blog.create')->with("success","Successfully, blog was created");

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show',[
            'blog'=>$blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',[
            'blog'=>$blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required'
        ]);


        if ($request->banner_image != NULL) {

            $imageName = NULL;

            $imageObject = $request->banner_image;

            $imageExtension = $imageObject->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;

            $imageObject->move(public_path('images'), $newImageName);

            $imageName = $newImageName;

            $data['banner_image'] = $imageName;

        }

        

        $blog->update($data);

        return to_route('blog.show', $blog)->with("success","Successfully, blog was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return to_route('blog.index')->with("success","Successfully, blog was deleted");
    }
}
