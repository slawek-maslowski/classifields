<?php

namespace App\Http\Controllers;

use App\Models\Classifield;
use App\Http\Requests\StoreClassifieldRequest;
use App\Http\Requests\UpdateClassifieldRequest;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class ClassifieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classifield.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassifieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassifieldRequest $request)
    {
        $classifield = new Classifield($request->validated());
        $classifield->user_id = auth()->id();
        $classifield->save();
        
        if($request->attachment)
        {
            $path = $request->attachment->store('public/photos');
            $attachment = new Attachment();
            $attachment->path = $path;
            $attachment->classifield_id = $classifield->id;

            $attachment->save();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classifield  $classifield
     * @return \Illuminate\Http\Response
     */
    public function show(Classifield $classifield)
    {
        $classifields = Classifield::with('Attachments')->where('user_id', auth()->id())->get();

        return view('classifield.show', ['classifields' => $classifields]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classifield  $classifield
     * @return \Illuminate\Http\Response
     */
    public function edit(Classifield $classifield)
    {
        return view('classifield.edit', ['classifield' => $classifield]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassifieldRequest  $request
     * @param  \App\Models\Classifield  $classifield
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassifieldRequest $request, Classifield $classifield)
    {
        $classifield->fill($request->validated());
        $classifield->save();

        return redirect()->route('classifield.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classifield  $classifield
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classifield $classifield)
    {
        $attachments = Attachment::where('classifield_id', $classifield->id)->get();

        foreach ($attachments as $attachment) {
            Storage::delete($attachment->path);
        }
        Attachment::where('classifield_id', $classifield->id)->delete();

        $classifield->delete();

        return redirect()->route('classifield.show');
    }
}
