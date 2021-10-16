<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(20);
        return view('admin.allbooks', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->createAssociativeArray(Author::all('id', 'name'));
        $categories = $this->createAssociativeArray(Category::all('id', 'category_name as name'));
        return view('admin.addbook', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'publication_date' => 'required|date',
            'copies_owned' => 'required|integer'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->category_id = $request->category;
        $book->publication_date = $request->publication_date;
        $book->copies_owned = $request->copies_owned;
        $book->save();
        $book->authors()->attach($request->author);


        return redirect()->back()->with('success', 'New book successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->with('success', 'successfully deleted');
    }

    private function createAssociativeArray(Collection $model)
    {
        $key = array_column($model->toArray(), 'id');
        $value = array_column($model->toArray(), 'name');
        $keyvalue = array_combine($key, $value);
        return $keyvalue;
    }
}
