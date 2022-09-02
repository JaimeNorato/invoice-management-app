<?php

namespace App\Repositories;

use App\Models\InvoiceDetail;

class InvoiceDetailRepository extends BaseRepository
{
    public function __construct(InvoiceDetail $invoiceDetail)
    {
        parent::__construct($invoiceDetail);
    }
}
