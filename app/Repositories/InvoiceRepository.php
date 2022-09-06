<?php

namespace App\Repositories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

class InvoiceRepository extends BaseRepository
{
    public function __construct(Invoice $invoice)
    {
        parent::__construct($invoice);
    }
    /**
     * Retorna todos los registros
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->with("issuer")->with("receiver")->get();
    }
}
