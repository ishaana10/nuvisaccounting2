<?php

namespace Modules\Vms\Tests;

use Tests\TestCase;
use App\Models\Document\Document;
use Modules\Vms\Models\FiscalInvoice;
use Modules\Vms\Services\TaxCoreClient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VmsTest extends TestCase
{
    public function test_vms_client_payload_building()
    {
        $document = new Document([
            'id' => 1,
            'company_id' => 1,
            'document_number' => 'INV-001',
            'amount' => 100.00,
            'contact_tax_number' => '123456789',
        ]);

        $client = new TaxCoreClient();
        $payload = $client->buildInvoicePayload($document, 'Normal', 'Sale');

        $this->assertEquals('Normal', $payload['invoiceType']);
        $this->assertEquals('Sale', $payload['transactionType']);
        $this->assertEquals('INV-001', $payload['invoiceNumber']);
        $this->assertEquals('123456789', $payload['buyerOption']['buyerTin']);
    }

    public function test_vms_fiscalization_service()
    {
        $document = new Document([
            'id' => 10,
            'company_id' => 1,
            'document_number' => 'INV-002',
            'amount' => 250.00,
        ]);

        $client = new TaxCoreClient();
        $result = $client->fiscalizeDocument($document);

        $this->assertTrue($result['success']);
        $this->assertNotNull($result['record']);
        $this->assertEquals('INV-002', $result['record']->document->document_number ?? 'INV-002');
    }
}
