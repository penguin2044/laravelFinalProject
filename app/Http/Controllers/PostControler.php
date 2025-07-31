<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;

class PostControler extends Controller
{
    public function createLink()
    {
        //grabs all the category table colmes 
        $categories = Category::all();
        //passes the categoire calems to the view
        return view('createPost',  compact('categories'));
    }
    public function editlink()
    {
        //grabs all the category table colmes 
        $categories = Category::all();

        //passes the categoire calems to the view
        return view('editPost',  compact('categories'));
    }
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'max:100'],
            'image' => ['image', 'nullable'],
            'category' => ['required', 'exists:categories,id'],
            'body' => ['required']
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);


        $postData = [
            'title' => $incomingFields['title'],
            'body' => $incomingFields['body'],
            'user_id' => auth()->id(),
            'category_id' => $incomingFields['category'],
            'lastEdit' => now()->toDateString(),
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            $image = Image::create(['url' => $imagePath]);

            $postData['image_id'] = $image->id;
        } else {
            $postData['image_id'] = null;
        }
        Post::create($postData);

        return redirect('/');
    }
    public function editPost(Request $request)
    {
        //ss
        //ss
    }
}
