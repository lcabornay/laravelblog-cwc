<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
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
        if (Auth::user()->role == 0){
            $articles = Article::with('user')->where('update_user_id', Auth::id())->get();
        }else {
            $articles = Article::all();
        }

        return view('articles.index', [ 'articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articleCategories = ArticleCategory::all();

        return view('articles.create', compact('articleCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create($this->validateArticle());

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $articleCategories = ArticleCategory::all();
        return view('articles.edit', [
            'article' => $article,
            'articleCategories' => $articleCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($this->validateArticle());

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     *
     * @throws
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json([
            'success' => 'Record deleted successfully!',
            'url' => route('articles.index'),
        ]);
    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'contents' => 'required',
            'article_category_id' => 'required',
            'update_user_id' => 'required',
            'image_path' => 'required',
        ]);
    }
}
