<?php

namespace Modules\Vms\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Models\Document\Document;
use Modules\Vms\Models\FiscalInvoice;
use Modules\Vms\Services\TaxCoreClient;
use Illuminate\Http\Request;

class Invoices extends Controller
{
    public function index()
    {
        $fiscalInvoices = FiscalInvoice::with('document')->orderBy('created_at', 'desc')->paginate(25);

        return view('vms::invoices.index', compact('fiscalInvoices'));
    }

    public function fiscalize($documentId)
    {
        $document = Document::findOrFail($documentId);
        $client = new TaxCoreClient();

        $result = $client->fiscalizeDocument($document);

        if ($result['success']) {
            flash('Document fiscalized successfully with Fiji VMS!')->success();
        } else {
            flash('VMS Fiscalization failed: ' . ($result['error'] ?? 'Unknown error'))->error();
        }

        return redirect()->back();
    }
}
