<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class UserPostController extends Controller
{
    public function index()
    {
        return view('posts.manage', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
        ]));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        $post->update($attributes);

        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }
}
