<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKidRequest;
use App\Http\Requests\UpdateKidRequest;
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
        return view('kids.index',compact('kids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kids.kidform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKidRequest $request)
    {
        $data = $request->validated();
        Kid::create($data);
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
        return view('kids.edit',compact('kid'));
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
    public function destroy(string $id)
    {
        //
    }
}
