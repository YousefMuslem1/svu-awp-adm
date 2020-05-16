<?php

namespace App\Http\Controllers\Dashboard;

use App\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::orderBy('is_replayed', 'asc')->orderBy('created_at', 'asc')->get();
        return view('dashboard.consultations.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        return view('dashboard.consultations.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy($id)
    {
        //
    }

    public function replay(Request $request,Consultation $consultation)
    {
        $consultation->admin_replay = $request->replay;
        $consultation->Replayed();
        $consultation->save();
        session()->flash('success', 'تم إرسال رد الى المستخدم ' . $consultation->user->name);
        return back();
    }
}
