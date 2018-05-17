@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.request.title')</h3>
    @can('request_create')
    <p>
        <a href="{{ route('admin.requests.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.requests.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.requests.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($requests) > 0 ? 'datatable' : '' }} @can('request_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('request_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.request.fields.customer')</th>
                        <th>@lang('global.users.fields.email')</th>
                        <th>@lang('global.users.fields.address')</th>
                        <th>@lang('global.users.fields.suburb')</th>
                        <th>@lang('global.users.fields.state')</th>
                        <th>@lang('global.users.fields.postcode')</th>
                        <th>@lang('global.users.fields.mobile')</th>
                        <th>@lang('global.request.fields.product-name')</th>
                        <th>@lang('global.request.fields.prefer-date')</th>
                        <th>@lang('global.request.fields.description')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($requests) > 0)
                        @foreach ($requests as $request)
                            <tr data-entry-id="{{ $request->id }}">
                                @can('request_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='customer'>{{ $request->customer->name or '' }}</td>
<td field-key='email'>{{ isset($request->customer) ? $request->customer->email : '' }}</td>
<td field-key='address'>{{ isset($request->customer) ? $request->customer->address : '' }}</td>
<td field-key='suburb'>{{ isset($request->customer) ? $request->customer->suburb : '' }}</td>
<td field-key='state'>{{ isset($request->customer) ? $request->customer->state : '' }}</td>
<td field-key='postcode'>{{ isset($request->customer) ? $request->customer->postcode : '' }}</td>
<td field-key='mobile'>{{ isset($request->customer) ? $request->customer->mobile : '' }}</td>
                                <td field-key='product_name'>{{ $request->product_name }}</td>
                                <td field-key='prefer_date'>{{ $request->prefer_date }}</td>
                                <td field-key='description'>{!! $request->description !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.requests.restore', $request->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.requests.perma_del', $request->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('request_view')
                                    <a href="{{ route('admin.requests.show',[$request->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('request_edit')
                                    <a href="{{ route('admin.requests.edit',[$request->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('request_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.requests.destroy', $request->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('request_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.requests.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection