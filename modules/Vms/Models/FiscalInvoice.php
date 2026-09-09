<?php

namespace Modules\Vms\Models;

use App\Abstracts\Model;

class FiscalInvoice extends Model
{
    protected $table = 'vms_fiscal_invoices';

    protected $fillable = [
        'company_id',
        'document_id',
        'invoice_type',
        'transaction_type',
        'sdc_invoice_number',
        'verification_url',
        'verification_qr_code',
        'sdc_time',
        'mrc',
        'cashier_tin',
        'buyer_tin',
        'total_amount',
        'sdc_response_payload',
        'status',
        'created_by',
    ];

    public function document()
    {
        return $this->belongsTo('App\Models\Document\Document', 'document_id');
    }
}
