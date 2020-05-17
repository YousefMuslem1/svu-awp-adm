<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search = request()->query('s');
        if($search)
        {
            $articles = Article::where('title', 'LIKE', "%{$search}%")->simplePaginate(6);
        } else {
            $articles = Article::orderBy('view_count', 'desc')->simplePaginate(6);
        }
//        Category::all();
        return view('home', [
                    'articles' =>  $articles,
                    'categories' => DB::select('select * from categories where categories.deleted_at is null'),
                    'topArticles' => Article::orderBy('view_count', 'desc')->take(5)->get()
                    ]);
    }

    // Get A Specific article
    public function getArticle(Request $request,Article $article)
    {
        if(!$request->session()->has('article_'.$article->id))
        {
            $request->session()->put('article_'.$article->id, 'article_'.$article->id);
            $this->isNewVisitor($article);
        }
        $categories = DB::select('select * from categories where categories.deleted_at is null');
        return view('articles.get_article', ['article' => $article])->with('categories', $categories);
    }

    public function getCategoriesArticles(Category $category)
    {
        $categories = DB::select('select * from categories where categories.deleted_at is null');
        return view('categories.get_categories_articles')
                ->with( 'articles' , $category->articles()->simplePaginate(8))
                ->with('categories', $categories);
    }

    public function askConsult()
    {
        return view('consult.ask_consult');
    }


    public function isNewVisitor(Article $article)
    {
        if(!Cookie::get('article_'.$article->id))
        {
            $article->view_count++;
            session()->put('article_'.$article->id, 'article_'.$article->id);
            Cookie::queue('article_'.$article->id, 'article_'.$article->id, 525600);
            $article->save();
        }
    }
}
