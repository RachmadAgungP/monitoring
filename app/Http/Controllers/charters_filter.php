<?php

function data_tglfilters($statushari)
{
    if ( $statushari >= 364 && $statushari <= 730){
        $statuscategory = "<div class='p-2 mb-2 bg-success text-white'> Masih Lama </div>";
    }elseif($statushari >= 182 && $statushari <= 364){
        $statuscategory = "<div class='p-2 mb-2 bg-primary text-white'> Kurang dari 1 tahun </div>";
    }elseif($statushari >= 91 && $statushari <= 182 ){
        $statuscategory = "<div class='p-2 mb-2 bg-secondary text-white'> Kurang dari 6 bulan </div>";
    }elseif($statushari >= 45 && $statushari <= 91){
        $statuscategory = "<div class='p-2 mb-2 bg-warning text-white'> Kurang dari 3 bulan </div>";
    }else{
        $statuscategory = "<div class='p-2 mb-2 bg-danger text-white'> Perlu dipantau </div>";
    }
    return $statuscategory;
}

function data_filter($data, $cat)
{
    if ($cat == '1'){
        $filter_periodes = now()->addDays(730)->format('Y-m-d'); 
        $filter_periodes1 = now()->addDays(364)->format('Y-m-d'); 
        $datas =  $data->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
    }elseif($cat == '2'){
        $filter_periodes = now()->addDays(364)->format('Y-m-d'); 
        $filter_periodes1 = now()->addDays(182)->format('Y-m-d');
        $datas =  $data->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
    }elseif($cat == '3'){
        $filter_periodes = now()->addDays(182)->format('Y-m-d'); 
        $filter_periodes1 = now()->addDays(91)->format('Y-m-d');
        $datas =  $data->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
    }elseif($cat == '4'){
        $filter_periodes = now()->addDays(91)->format('Y-m-d'); 
        $filter_periodes1 = now()->addDays(45)->format('Y-m-d');
        $datas =  $data->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
    }else{
        $filter_periodes = now()->addDays(45)->format('Y-m-d'); 
        $filter_periodes1 = now()->addDays(1)->format('Y-m-d');
        $datas =  $data->whereBetween('akhir',[$filter_periodes1,$filter_periodes]);
    }
    return $datas;
}
