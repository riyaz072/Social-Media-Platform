<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CreatePostRequest;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.create-post.create_post');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CreatePostRequest $request)
    {
        $post = Post::create([
            'caption' => $request->caption,
            'user_id' => Auth::user()->id,
        ]);

        // $newImageName = null;

            foreach ($request->post_image as $image) {
                $newImageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('images', $newImageName);
                PostImage::create([
                    'post_id' => $post->id,
                    'post_image' => $newImageName,
                ]);

        }
        return redirect()->route('profile.index')->with('Success', 'Posted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePostRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
