<?php

namespace Modules\Vms\Listeners;

use App\Events\Document\DocumentCreated;
use Modules\Vms\Services\TaxCoreClient;
use Illuminate\Support\Facades\Log;

class FiscalizeCreatedInvoice
{
    /**
     * Handle the event.
     *
     * @param  DocumentCreated  $event
     * @return void
     */
    public function handle(DocumentCreated $event)
    {
        $document = $event->document;

        if ($document->type !== 'invoice') {
            return;
        }

        if (setting('vms.enabled', '0') !== '1') {
            return;
        }

        try {
            $client = new TaxCoreClient();
            $client->fiscalizeDocument($document);
        } catch (\Exception $e) {
            Log::error('Auto VMS Fiscalization listener error: ' . $e->getMessage());
        }
    }
}
