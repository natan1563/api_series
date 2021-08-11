<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends BaseController
{

    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function buscaPorSerie(Int $serieId)
    {
        $episodios = Episodio::query()
        ->where('serie_id', $serieId)
        ->get();

        return $episodios;
    }

}
