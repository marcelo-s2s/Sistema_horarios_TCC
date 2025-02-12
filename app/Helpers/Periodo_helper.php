<?php

use App\Models\PeriodoLetivoModel;

if (!function_exists('getPeriodoAtivo')) {
    function getPeriodoAtivo()
    {
        $model = new PeriodoLetivoModel();
        return $model->select('periodo')->where('ativo', 1)->first()['periodo'] ?? null;
    }
}