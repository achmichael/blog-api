<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Blog::all()
        ]); 
    }

    public function store()
    {
        $data = request()->all();
        if (!is_array($data)){

            $validation = validator($data, [
                'title' => 'required|string|max:50',
                'description' => 'required',
                'image' => 'required|array'
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'message' => 'Invalid data',
                    'errors' => $validation->errors()
                ], 400);
            }

            $blog = Blog::create($data);
            return response()->json([
                'message' => 'Blog created',
                'data' => $blog
            ]);
            
        }

        $blogs = [];
        foreach ($data as $entry) {
            $validation = validator($entry, [
                'title' => 'required|string|max:50',
                'description' => 'required',
                'image' => 'required|array'
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'message' => 'Invalid data',
                    'errors' => $validation->errors()
                ], 400);
            }

            $blogs[] = Blog::create($entry);
        }

        return response()->json([
            'message' => 'Blogs created',
            'data' => $blogs
        ]);
    }

    public function show($id)
    {
        if (!$id)
        {
            return response()->json([
                'message' => 'id required'
            ], 400);
        }

        $blog = Blog::find($id);
        if (!$blog)
        {
            return response()->json([
                'message' => 'Blog not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Blog found',
            'data' => $blog
        ]);
    }

    public function update($id)
    {
        if (!$id)
        {
            return response()->json([
                'message' => 'id required'
            ], 400);
        }

        $data = request()->only(['title', 'description', 'image']);
        $validation = validator($data, [
            'title' => 'required|string:50',
            'description' => 'required',
            'image' => 'required|array'
        ]);

        if ($validation->fails())
        {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => $validation->errors()
            ], 400);
        }

        $blog = Blog::find($id);
        if (!$blog)
        {
            return response()->json([
                'message' => 'Blog not found'
            ], 404);
        }

        $blog->update($data);
        return response()->json([
            'message' => 'Blog updated',
            'data' => $blog
        ]);
    }

    public function destroy($id)
    {
        if (!$id)
        {
            return response()->json([
                'message' => 'id required'
            ], 400);
        }

        $blog = Blog::find($id);
        if (!$blog)
        {
            return response()->json([
                'message' => 'Blog not found'
            ], 404);
        }

        $blog->delete();
        return response()->json([
            'message' => 'Blog deleted'
        ]);
    }
}
