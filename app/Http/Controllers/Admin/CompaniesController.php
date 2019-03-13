<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCompaniesRequest;
use App\Http\Requests\Admin\UpdateCompaniesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;


class CompaniesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('company_access')) {
            return abort(401);
        }

        $user = \Auth::user();



        if($user->role_id == 1) {
            if (request('show_deleted') == 1) {
                if (!Gate::allows('company_delete')) {
                    return abort(401);
                }
                $companies = Company::onlyTrashed()->get();
            } else {
                $companies = Company::all();
            }

            return view('admin.companies.index', compact('companies'));
        }
        elseif($user->role_id == 2 ){

            //$companies = $user->companies()->first();
            $companies = $user->companies()->get();
            //dd($companies);
            return view('admin.companies.index', compact('companies'));
        }
    }

    /**
     * Show the form for creating new Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('company_create')) {
            return abort(401);
        }

        $cities = \App\City::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $province = \App\Province::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $country = \App\Country::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $categories = \App\Category::pluck('name', 'id');

        return view('admin.companies.create', compact('cities', 'province', 'country', 'categories'));
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param  \App\Http\Requests\StoreCompaniesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompaniesRequest $request)
    {
        if (! Gate::allows('company_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $company = Company::create($request->all());
        $company->categories()->sync(array_filter((array)$request->input('categories')));

        return redirect()->route('admin.companies.index');
    }


    /**
     * Show the form for editing Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('company_edit')) {
            return abort(401);
        }


        //$users = \App\User::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $cities = \App\City::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $province = \App\Province::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $country = \App\Country::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $categories = \App\Category::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $company = Company::findOrFail($id);

        $manage = $this->manage($id);
        if ($manage) {


            return view('admin.companies.edit', compact('company', 'cities', 'province', 'country', 'categories'));
        }
        else{
            return abort(401);
        }
    }


    /**
     * Update Company in storage.
     *
     * @param  \App\Http\Requests\UpdateCompaniesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompaniesRequest $request, $id)
    {
        if (! Gate::allows('company_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $company = Company::findOrFail($id);
        $company->update($request->all());
        $company->categories()->sync(array_filter((array)$request->input('categories')));

        return redirect()->route('admin.companies.show', [$company->id]);
    }




    /**
     * Display Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('company_view')) {
            return abort(401);
        }

        $company = Company::findOrFail($id);

        $manage = $this->manage($id);
        if ($manage) {


            return view('admin.companies.show', compact('company'));
        }
        else{
            return abort(401);
        }




    }


    /**
     * Remove Company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('company_delete')) {
            return abort(401);
        }
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.companies.index');
    }

    /**
     * Delete all selected Company at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('company_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Company::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('company_delete')) {
            return abort(401);
        }
        $company = Company::onlyTrashed()->findOrFail($id);
        $company->restore();

        return redirect()->route('admin.companies.index');
    }

    /**
     * Permanently delete Company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('company_delete')) {
            return abort(401);
        }
        $company = Company::onlyTrashed()->findOrFail($id);
        $company->forceDelete();

        return redirect()->route('admin.companies.index');
    }

    public function manage($id){

        $user = \Auth::user();
        $role_id = $user->role_id;
        $ucompany = $user->companies()->first();
        if($role_id == 2){

           if($ucompany->id == $id){

               return true;

           }
           else{
               return false;
           }


        }
        if($role_id == 1){
            return true;
        }


    }


}
