<?php

namespace Modules\Vms\Http\Controllers;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;

class Settings extends Controller
{
    public function edit()
    {
        $settings = [
            'api_url' => setting('vms.api_url', config('vms.api_url')),
            'pac_code' => setting('vms.pac_code', config('vms.pac_code')),
            'cashier_tin' => setting('vms.cashier_tin', config('vms.cashier_tin')),
            'pos_number' => setting('vms.pos_number', config('vms.pos_number')),
            'certificate_path' => setting('vms.certificate_path', ''),
            'enabled' => setting('vms.enabled', '0'),
        ];

        return view('vms::settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'api_url' => 'required|url',
            'pac_code' => 'required|string',
            'cashier_tin' => 'required|string',
            'pos_number' => 'required|string',
        ]);

        setting([
            'vms.api_url' => $request->input('api_url'),
            'vms.pac_code' => $request->input('pac_code'),
            'vms.cashier_tin' => $request->input('cashier_tin'),
            'vms.pos_number' => $request->input('pos_number'),
            'vms.certificate_path' => $request->input('certificate_path', ''),
            'vms.enabled' => $request->has('enabled') ? '1' : '0',
        ])->save();

        flash(trans('vms::general.settings_updated'))->success();

        return redirect()->route('vms.settings.edit');
    }
}
