@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.booking.title')</h3>
    @can('booking_create')
    <p>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.bookings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.bookings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($bookings) > 0 ? 'datatable' : '' }} @can('booking_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('booking_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.booking.fields.customer')</th>
                        <th>@lang('global.users.fields.email')</th>
                        <th>@lang('global.users.fields.address')</th>
                        <th>@lang('global.users.fields.suburb')</th>
                        <th>@lang('global.users.fields.state')</th>
                        <th>@lang('global.users.fields.postcode')</th>
                        <th>@lang('global.users.fields.phone')</th>
                        <th>@lang('global.users.fields.mobile')</th>
                        <th>@lang('global.booking.fields.installer')</th>
                        <th>@lang('global.booking.fields.date-install')</th>
                        <th>@lang('global.booking.fields.model')</th>
                        <th>@lang('global.booking.fields.serial')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($bookings) > 0)
                        @foreach ($bookings as $booking)
                            <tr data-entry-id="{{ $booking->id }}">
                                @can('booking_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='customer'>{{ $booking->customer->name or '' }}</td>
<td field-key='email'>{{ isset($booking->customer) ? $booking->customer->email : '' }}</td>
<td field-key='address'>{{ isset($booking->customer) ? $booking->customer->address : '' }}</td>
<td field-key='suburb'>{{ isset($booking->customer) ? $booking->customer->suburb : '' }}</td>
<td field-key='state'>{{ isset($booking->customer) ? $booking->customer->state : '' }}</td>
<td field-key='postcode'>{{ isset($booking->customer) ? $booking->customer->postcode : '' }}</td>
<td field-key='phone'>{{ isset($booking->customer) ? $booking->customer->phone : '' }}</td>
<td field-key='mobile'>{{ isset($booking->customer) ? $booking->customer->mobile : '' }}</td>
                                <td field-key='installer'>{{ $booking->installer }}</td>
                                <td field-key='date_install'>{{ $booking->date_install }}</td>
                                <td field-key='model'>{{ $booking->model }}</td>
                                <td field-key='serial'>{{ $booking->serial }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bookings.restore', $booking->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bookings.perma_del', $booking->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('booking_view')
                                    <a href="{{ route('admin.bookings.show',[$booking->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('booking_edit')
                                    <a href="{{ route('admin.bookings.edit',[$booking->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('booking_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bookings.destroy', $booking->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('booking_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection