<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Category;
use App\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $articles =  DB::select('select * from articles where articles.deleted_at is null');;
        $categories = DB::select('select * from categories where categories.deleted_at is null');
        $consult_rep = DB::select('select * from consultations where is_replayed = ?', [1]);
        $consult_not_rep =DB::select('select * from consultations where is_replayed = ?', [0]);
        $trashArt = DB::select('select count(*) as aggregate from articles where articles.deleted_at is not null');
        $trashCat =  DB::select('select count(*) as aggregate from categories where categories.deleted_at is not null');
        $totalTrash = $trashArt[0]->aggregate + $trashCat[0]->aggregate;
        return  view('dashboard.home', compact([
            'articles', 'categories', 'consult_rep', 'consult_not_rep', 'totalTrash'
                ]))
            ;
    }
}
