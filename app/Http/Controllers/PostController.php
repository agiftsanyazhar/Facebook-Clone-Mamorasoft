<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();

        $data = [
            'title' => 'Facebook',
            'posts' => $posts,
        ];

        return view('index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'caption' => 'required|string',
                'image_video' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240',
            ]);

            $data['user_id'] = auth()->id();

            if ($request->hasFile('image_video')) {
                $data['image_video'] = $request->file('image_video')->store('uploads', 'public');
            }

            Post::create($data);

            return redirect()->back()->with('success', 'Post created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to create post. Please try again.');
        }
    }
}
