<?php

namespace App\Http\Controllers;

use App\Models\Samples;
use Illuminate\Http\Request;

class SamplesController extends Controller
{
    private $sample;

    public function __construct(Samples $sample)
    {
        $this->sample = $sample;
    }
}
