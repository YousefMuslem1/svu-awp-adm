<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function getTrash()
    {
        return view('dashboard.trash.get_trash')
            ->with('categoriesTrashedCount', Category::onlyTrashed()->count())
            ->with('articlesTrashedCount', Article::onlyTrashed()->count());
    }

    public function getCategoryTrash()
    {
       $categories= Category::onlyTrashed()->get();
        return view('dashboard.trash.category', compact('categories'));
    }

    public function getArticleTrash()
    {
        $articles= Article::onlyTrashed()->get();
        return view('dashboard.trash.articles_trash', compact('articles'));
    }

}
