<?php

namespace App\Http\Controllers;

use App\Category;
use App\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Store user consult
    public function saveConsult(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'consult_add' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'dis_history' => 'required|min:15',
            'consult_body' => 'required|min:15',
            'user_id' => 'required'
        ])->validate();
        DB::insert('insert into `consultations` (`consult_add`, `age`, `gender`, `dis_history`, `consult_body`, `user_id`, `updated_at`, `created_at`) values (?, ?, ?, ?, ?, ?, ?, ?)',
                        [$request->consult_add, $request->age, $request->gender, $request->dis_history, $request->consult_body, auth()->user()->id, now(), now()]);
        session()->flash('success', 'تم إرسال الاستشارة بنجاح سيتم الرد في أسرع وقت');
        return redirect(route('inbox'));
    }

    //show all messages for a user
    public function inbox()
    {
        $messages = Consultation::where('user_id', auth()->user()->id)
                                    ->orderBy('is_replayed', 'asc')->orderBy('created_at', 'desc')
                                    ->get();
//        $messages = DB::select('select * from `consultations` where `user_id` = ? order by `is_replayed` asc, `created_at` desc',[auth()->user()->id]);
        $categories = DB::select('select * from `categories` where `categories`.`deleted_at` is null');

        return view('consult.inbox', compact('messages'))->with('categories', $categories);
    }

    public function getMessage(Consultation $consult)
    {
        if(auth()->user()->id === $consult->user_id)
        {
            $categories = DB::select('select * from `categories` where `categories`.`deleted_at` is null');
                return view('consult.get_message', ['consult' => $consult])->with('categories', $categories);
        } else
            return back();
    }


}
