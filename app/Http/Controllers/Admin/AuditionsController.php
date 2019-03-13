<?php

namespace App\Http\Controllers\Admin;

use App\Audition;
use App\Http\Requests\Admin\StoreAuditionsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth;

class AuditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = \Auth::user();

        if($user->role_id == 1) {
            if (request('show_deleted') == 1) {
                if (! Gate::allows('audition_delete')) {
                    return abort(401);
                }
                $auditions = Audition::onlyTrashed()->get();
            } else {
                $auditions = Audition::all();
            }

            return view('admin.auditions.index', compact('auditions'));
        }
        elseif($user->role_id == 2 ){

            $companies = $user->companies()->first();
            $auditions =  $companies->auditions()->get();
            //dd($auditions);
            return view('admin.auditions.index', compact('auditions'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = \Auth::user();
        $owner = $user->id;
        $categories = \App\Category::pluck('name', 'id');
        $companies = \App\Company::pluck('name', 'id');
        $venues = \App\Venue::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.auditions.create', compact('categories', 'companies', 'venues', 'owner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuditionsRequest $request)
    {
        //
        if (! Gate::allows('audition_create')) {
            return abort(401);
        }

        $audition = Audition::create($request->all());
        $audition->categories()->sync(array_filter((array)$request->input('categories')));
        $audition->companies()->sync(array_filter((array)$request->input('companies')));

        return redirect()->route('admin.auditions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audition  $audition
     * @return \Illuminate\Http\Response
     */
    public function show(Audition $audition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audition  $audition
     * @return \Illuminate\Http\Response
     */
    public function edit(Audition $audition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audition  $audition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audition $audition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audition  $audition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audition $audition)
    {
        //
    }

    public function myAuditions($user){

    }
}
