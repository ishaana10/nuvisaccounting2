@extends('layouts.admin')

@section('title', trans('vms::general.settings'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ trans('vms::general.settings') }}</h3>
        </div>

        {!! Form::open(['route' => 'vms.settings.update', 'method' => 'POST', 'class' => 'form-loading-button']) !!}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="api_url" class="form-control-label">{{ trans('vms::general.api_url') }}</label>
                        <input type="text" name="api_url" value="{{ $settings['api_url'] }}" class="form-control" required id="api_url">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="pac_code" class="form-control-label">{{ trans('vms::general.pac_code') }}</label>
                        <input type="text" name="pac_code" value="{{ $settings['pac_code'] }}" class="form-control" required id="pac_code">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cashier_tin" class="form-control-label">{{ trans('vms::general.cashier_tin') }}</label>
                        <input type="text" name="cashier_tin" value="{{ $settings['cashier_tin'] }}" class="form-control" required id="cashier_tin">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="pos_number" class="form-control-label">{{ trans('vms::general.pos_number') }}</label>
                        <input type="text" name="pos_number" value="{{ $settings['pos_number'] }}" class="form-control" required id="pos_number">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="certificate_path" class="form-control-label">{{ trans('vms::general.certificate_path') }}</label>
                        <input type="text" name="certificate_path" value="{{ $settings['certificate_path'] }}" class="form-control" id="certificate_path">
                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="enabled" value="1" class="custom-control-input" id="vms_enabled" {{ $settings['enabled'] == '1' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="vms_enabled">{{ trans('vms::general.enabled') }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ trans('general.save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
