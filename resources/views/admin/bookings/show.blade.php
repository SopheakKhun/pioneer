@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.booking.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.booking.fields.customer')</th>
                            <td field-key='customer'>{{ $booking->customer->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ isset($booking->customer) ? $booking->customer->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.address')</th>
                            <td field-key='address'>{{ isset($booking->customer) ? $booking->customer->address : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.suburb')</th>
                            <td field-key='suburb'>{{ isset($booking->customer) ? $booking->customer->suburb : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.state')</th>
                            <td field-key='state'>{{ isset($booking->customer) ? $booking->customer->state : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.postcode')</th>
                            <td field-key='postcode'>{{ isset($booking->customer) ? $booking->customer->postcode : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.phone')</th>
                            <td field-key='phone'>{{ isset($booking->customer) ? $booking->customer->phone : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.mobile')</th>
                            <td field-key='mobile'>{{ isset($booking->customer) ? $booking->customer->mobile : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.booking.fields.installer')</th>
                            <td field-key='installer'>{{ $booking->installer }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.booking.fields.date-install')</th>
                            <td field-key='date_install'>{{ $booking->date_install }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.booking.fields.model')</th>
                            <td field-key='model'>{{ $booking->model }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.booking.fields.serial')</th>
                            <td field-key='serial'>{{ $booking->serial }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.bookings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
