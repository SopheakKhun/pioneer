@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.request.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.request.fields.customer')</th>
                            <td field-key='customer'>{{ $request->customer->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ isset($request->customer) ? $request->customer->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.address')</th>
                            <td field-key='address'>{{ isset($request->customer) ? $request->customer->address : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.suburb')</th>
                            <td field-key='suburb'>{{ isset($request->customer) ? $request->customer->suburb : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.state')</th>
                            <td field-key='state'>{{ isset($request->customer) ? $request->customer->state : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.postcode')</th>
                            <td field-key='postcode'>{{ isset($request->customer) ? $request->customer->postcode : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.mobile')</th>
                            <td field-key='mobile'>{{ isset($request->customer) ? $request->customer->mobile : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.request.fields.product-name')</th>
                            <td field-key='product_name'>{{ $request->product_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.request.fields.prefer-date')</th>
                            <td field-key='prefer_date'>{{ $request->prefer_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.request.fields.description')</th>
                            <td field-key='description'>{!! $request->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.requests.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
