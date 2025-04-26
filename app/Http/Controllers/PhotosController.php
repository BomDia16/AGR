<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    private $photo;

    public function __construct(Photos $photo)
    {
        $this->photo = $photo;
    }
}
