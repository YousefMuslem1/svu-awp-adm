<?php

namespace App\Http\Controllers\Dashboard;
use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::orderBy('updated_at', 'asc')->paginate(8);
        return view('dashboard.categories.index')->with('categories', $categories);
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required|unique:categories'
        ]);
        $errors = $validator->errors();
        if($validator->fails()) {
            return response()->json([
               'success' => false,
                'message' => $errors->first('name')
            ]);
        }

        DB::insert('insert into categories (name) values (?)', [$request->name]);

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة قسم جديد بنجاج'
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories'
        ]);
        $errors = $validator->errors();
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $errors->first('name')
            ]);
        }

        DB::update('update categories set name=? where id = ?', [$request->name, $request->id]);

        return response()->json([
            'success' => true,
            'message' => 'تم تعديل القسم  بنجاج'
        ]);
    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy($id)
    {
        $category = Category::withTrashed()->where('id', $id)->findOrFail($id);
        if($category->trashed())
        {
//            $category->articles()->forceDelete();
            DB::delete('delete from articles where category_id = ? and category_id is not null', [$id]);
            DB::delete('delete from categories where id=?', [$id]);
            session()->flash('success', 'تم حذف القسم ' . $category->name );
            return back();
        }
//        $category->articles()->delete();
        DB::update('update articles set deleted_at = ?, updated_at = ? where category_id = ? and category_id is not null and deleted_at is null',[now(), now(), $id]);
        DB::update('update categories set deleted_at = ?, updated_at = ? where id = ?',[now(), now(), $id]);
        session()->flash('success', 'تم حذف القسم ' . $category->name );
        return back();
    }

    public function restoreCategory($id)
    {
//        $category = Category::withTrashed()->where('id', $id)->firstOrFail()->restore();
        DB::update('update categories set deleted_at = ?, updated_at = ? where id = ?', [null,now(),$id]);

//        $article = Article::onlyTrashed()->findOrFail($id)->restore();
        DB::update('update articles set deleted_at = ?, updated_at = ? where category_id = ?', [null,now(),$id]);

        return back();
    }

    public function getArticles($id)
    {
        $category = Category::findOrFail($id)->first();
            return view('dashboard.categories.get_articles', ['articles' => $category->articles]);
    }
}
