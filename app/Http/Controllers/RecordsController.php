<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    private $record;

    public function __construct(Records $record)
    {
        $this->record = $record;
    }
}
