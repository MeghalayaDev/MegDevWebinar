<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinars = Webinar::orderBy('date', 'desc')->get();

        return view('webinars.index', ['webinars' => $webinars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webinars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'date' => 'required',
            'time' => 'required',
            'presenter' => 'required',
            'mode' => 'required',
            'youtube_embed_code' => 'required',
            'source_code' => 'required'
        ]);

        Webinar::create($request->all());

        return redirect('/webinars')->with('success', 'Webinar created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $webinar = Webinar::find($id);
        return view('webinars.show')->with('webinar', $webinar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webinar = Webinar::find($id);

        return view('webinars.edit')->with('webinar', $webinar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'topic' => 'required',
            'date' => 'required',
            'time' => 'required',
            'presenter' => 'required',
            'mode' => 'required',
            'youtube_embed_code' => 'required',
            'source_code' => 'required'
        ]);

        $webinar = Webinar::find($id);

        $webinar->update($request->all());

        return redirect('/webinars/' . $id)->with('success', 'Webinar Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webinar = Webinar::find($id);
        $webinar->delete();

        return redirect('/webinars')->with('success', 'Webinar deleted successfully');
    }
}
