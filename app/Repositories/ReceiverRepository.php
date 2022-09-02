<?php

namespace App\Repositories;

use App\Models\Receiver;

class ReceiverRepository extends BaseRepository
{
    public function __construct(Receiver $receiver)
    {
        parent::__construct($receiver);
    }

}
