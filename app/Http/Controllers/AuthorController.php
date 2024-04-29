<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);

        return view('pages/author', compact('author'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'biography' => 'nullable',
        ]);

        $author = new Author();
        $author->name = $request->input('name');
        $author->biography = $request->input('biography');
        $author->created_at = now();
        $author->updated_at = now();
        $author->save();

        return redirect()->back()->with('success', "Author - $author->name - created successfully!");
    }

}
