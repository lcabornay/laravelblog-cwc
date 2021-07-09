<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleCategories = ArticleCategory::latest()->get();

        return view('article_categories.index', ['articleCategories' => $articleCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        ArticleCategory::create(request()->validate([
            'name' => 'required',
            'update_user_id' => 'required',
        ]));

        return redirect(route('article_categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('article_categories.edit', compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleCategory $articleCategory)
    {
        $articleCategoryAttr = request()->validate([
            'name' => 'required',
            'update_user_id' => 'required',
        ]);

        $articleCategory->update($articleCategoryAttr);

        return redirect(route('article_categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     *
     * @throws
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
            'url' => route('article_categories.index'),
        ]);
    }
}
