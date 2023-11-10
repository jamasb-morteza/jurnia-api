<?php

namespace App\Http\Controllers;

use App\Models\EloquentModels\agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('agencies.index');
    }


    public function filter(Request $request)
    {
        $agencies_query = Agency::query();
        $agencies = $agencies_query->paginate(10);
        return view('agencies.table', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('agencies.create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user();
        $agency = Agency::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'name' => $request->name,
            'national_id' => $request->national_id,
            'about' => $request->about,
            'description' => $request->description,
        ]);
        return response()->json(['data' => $agency]);
    }

    /**
     * Display the specified resource.
     */
    public function show(agency $agency)
    {
        //
        return view('agencies.view', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(agency $agency)
    {
        //
        return view('agencies.edit_form', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, agency $agency)
    {
        //
        $agency = $agency->update([
            'title' => $request->title,
            'name' => $request->name,
            'national_id' => $request->national_id,
            'about' => $request->about,
            'description' => $request->description,
        ]);
        return response()->json(['data' => $agency]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(agency $agency)
    {
        //
        $agency->delete();
        return response()->json(['success' => true]);
    }
}
