<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKidRequest;
use App\Http\Requests\UpdateKidRequest;
use App\Models\Course;
use App\Models\Kid;
use Illuminate\Http\Request;

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kids = Kid::all();
        $courses = Course::all();
        return view('kids.index',compact('kids','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('kids.kidform',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKidRequest $request)
    {
        $data = $request->validated();
         $kid = Kid::create($data);

        $kid->courses()->attach($request->course_ids);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kid $kid)
    {
       return view('kids.show',compact('kid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kid $kid)
    {
         $courses = Course::all();
        return view('kids.edit',compact('kid','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKidRequest $request, Kid $kid)
    {
        $kid->update($request->validated());

        return redirect('/')->with('success', 'Kid updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kid $kid)
    {
        $kid->delete();
         return redirect('/kids');


    }
}
