<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StoreCoursesRequest;

class CoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (! Gate::allows('course_create')) {
            return abort(401);
        }
        $company_id = $request->school;
        $qualifications = \App\Qualification::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $company = \App\Company::pluck('name', 'id');
        $company_det = Company::find($company_id);
        $categories = $company_det->categories()->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.courses.create', compact('company_id', 'qualifications', 'company', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesRequest $request)
    {
        if (! Gate::allows('course_create')) {
            return abort(401);
        }
        $company_id = $request->company_id;
        $course = Course::create($request->all());
        return redirect()->route('admin.companies.show', compact('company_id'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "this is the show method".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('course_create')) {
            return abort(401);
        }
        $course = Course::findOrFail($id);
        $qualifications = \App\Qualification::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $company = \App\Company::pluck('name', 'id');
        $company_id = $course->company_id;
        $company_det = Company::find($company_id);
        $categories = $company_det->categories()->get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.courses.edit', compact('course','company_id', 'qualifications', 'company', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
