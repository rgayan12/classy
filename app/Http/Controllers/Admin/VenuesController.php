<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreVenuesRequest;
use App\User;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth;

class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (! Gate::allows('venue_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('venues_delete')) {
                return abort(401);
            }
            $venues = Venue::onlyTrashed()->get();
        } else {
            $venues = Venue::all();
        }

        return view('admin.venues.index', compact('venues'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('venue_create')) {
            return abort(401);
        }
        $province = \App\Province::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $country = \App\Country::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $user = auth()->user()->id;
        return view('admin.venues.create', compact('province', 'country', 'user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenuesRequest $request)
    {
        if (! Gate::allows('venue_create')) {
            return abort(401);
        }



        $venue = Venue::create($request->all());


        return redirect()->route('admin.venues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
