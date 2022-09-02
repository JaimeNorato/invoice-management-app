<?php

namespace App\Repositories;

use App\Models\Issuer;

class IssuerRepository extends BaseRepository
{
    public function __construct(Issuer $issuer)
    {
        parent::__construct($issuer);
    }
}
