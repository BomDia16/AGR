<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    private $request;

    public function __construct(Requests $request)
    {
        $this->request = $request;
    }
}
