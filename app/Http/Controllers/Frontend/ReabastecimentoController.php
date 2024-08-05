<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @deprecated
 */
class ReabastecimentoController extends Controller
{
    public function __construct()
    {
    }

    public function carros()
    {
        return $this->render("reabastecimento.carros");
    }

    public function registros()
    {
        return $this->render("reabastecimento.registros");
    }
}
