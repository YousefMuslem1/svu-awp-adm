<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('visitors')->only('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.articles.index')
                        ->with('articles', Article::orderBy('view_count', 'desc')
                                                    ->orderBy('created_at', 'desc')
                                                    ->paginate(8));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::select('select * from categories where categories.deleted_at is null');
        return view('dashboard.articles.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
       $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ])->validate();

//         $validated['image'] = $request->file('image')->store('articles');
//        \DB::connection()->enableQueryLog();
//         Article::create($validated);
         DB::insert('insert into articles (title, description, category_id, image, updated_at, created_at) values (?, ?, ?, ?, ?, ?)',[
             $request->title, $request->description, $request->category_id, $request->file('image')->store('articles'), now(), now()
         ]);
//        $queries = \DB::getQueryLog();
//        return dd($queries);
         session()->flash('success', 'تم إضافة مقالة جديدة بعنوان ' . $validated['title']);
         return redirect(route('dashboard.articles.index'));
    }

    /**
     * Display the specified resource.

     */
    public function show(Request $request,Article $article)
    {
        if(!$request->session()->has('article_'.$article->id))
        {
            $request->session()->put('article_'.$article->id, 'article_'.$article->id);
            $this->isNewVisitor($article);
        }
        return view('dashboard.articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit')->with('article', $article)
                                                    ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, Article $article)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ])->validate();

        $article->title = $request->title;
        $article->description = $request->description;
        $article->category_id = $request->category_id;
        if(!is_null($request->file('image')))
        {
            Storage::delete($article->image);
            $article->image = $request->file('image')->store('articles', 'public');
        }
        $article->save();
        session()->flash('success', 'تم تعديل المقالة '. $article->title);
        return redirect(route('dashboard.articles.index'));

    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy($id)
    {
//        $article = Article::withTrashed()->findOrFail($id);

        $article = DB::select('select * from articles where articles.id = ? limit 1', [$id]);

//        $article->trashed();
    if(!is_null($article[0]->deleted_at))
    {
        Storage::delete('public/' . $article[0]->image);

//        $article->forceDelete();
        DB::delete('delete from articles where id = ?', [$id]);

        $message = " تم حذف المقالة  بنجاح <b> </b>";
        session()->flash('success', $message );
        return back();
    }

        DB::update('update articles set deleted_at = ?, updated_at = ? where id = ?',[now(), now(), $id]);

//        $article->delete();
        $message = " تم نقل المقالة  الى سلة المحذوفات <b>  </b>";
        session()->flash('success', $message );
        return redirect(route('dashboard.articles.index'));
    }

    public function restoreArticle($id)
    {
//        $article = Article::onlyTrashed()->findOrFail($id);
        $article = DB::select('select * from articles where articles.deleted_at is not null and articles.id = ? limit 1', [$id]);
//        $category = Category::where('id', $article->category_id)->first();
        $category = DB::select('select * from categories where id = ? and categories.deleted_at is null limit 1', [$article[0]->category_id]);

        if($category) {
//            $article->restore();
            DB::update('update articles set deleted_at = ?, articles.updated_at = ? where id = ?', [
                null, now(), $id
            ]);
            session()->flash('success',  'تم استعادة المقالة' . $article[0]->title);
        } else {
            session()->flash('error', 'القسم المحتوي للمقالة محذوف لايمكن استعادتها');
        };

        return back();
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
