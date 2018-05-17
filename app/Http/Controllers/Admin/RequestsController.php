<?php

namespace App\Http\Controllers\Admin;

use App\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequestsRequest;
use App\Http\Requests\Admin\UpdateRequestsRequest;

class RequestsController extends Controller
{
    /**
     * Display a listing of Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('request_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('request_delete')) {
                return abort(401);
            }
            $requests = Request::onlyTrashed()->get();
        } else {
            $requests = Request::all();
        }

        return view('admin.requests.index', compact('requests'));
    }

    /**
     * Show the form for creating new Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('request_create')) {
            return abort(401);
        }
        
        $customers = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.requests.create', compact('customers'));
    }

    /**
     * Store a newly created Request in storage.
     *
     * @param  \App\Http\Requests\StoreRequestsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestsRequest $request)
    {
        if (! Gate::allows('request_create')) {
            return abort(401);
        }
        $request = Request::create($request->all());



        return redirect()->route('admin.requests.index');
    }


    /**
     * Show the form for editing Request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('request_edit')) {
            return abort(401);
        }
        
        $customers = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $request = Request::findOrFail($id);

        return view('admin.requests.edit', compact('request', 'customers'));
    }

    /**
     * Update Request in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestsRequest $request, $id)
    {
        if (! Gate::allows('request_edit')) {
            return abort(401);
        }
        $request = Request::findOrFail($id);
        $request->update($request->all());



        return redirect()->route('admin.requests.index');
    }


    /**
     * Display Request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('request_view')) {
            return abort(401);
        }
        $request = Request::findOrFail($id);

        return view('admin.requests.show', compact('request'));
    }


    /**
     * Remove Request from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('request_delete')) {
            return abort(401);
        }
        $request = Request::findOrFail($id);
        $request->delete();

        return redirect()->route('admin.requests.index');
    }

    /**
     * Delete all selected Request at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('request_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Request::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Request from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('request_delete')) {
            return abort(401);
        }
        $request = Request::onlyTrashed()->findOrFail($id);
        $request->restore();

        return redirect()->route('admin.requests.index');
    }

    /**
     * Permanently delete Request from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('request_delete')) {
            return abort(401);
        }
        $request = Request::onlyTrashed()->findOrFail($id);
        $request->forceDelete();

        return redirect()->route('admin.requests.index');
    }
}
