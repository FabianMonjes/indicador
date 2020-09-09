<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxDataController extends Controller
{
    public function index(){
        $apiUrl = 'https://mindicador.cl/api';
        $json = file_get_contents($apiUrl);
        $dailyIndicators = json_decode($json);
        $array = array();
        $x =0;
        foreach ( $dailyIndicators as $item => $value) {
            $x++;
            if($x>3){
                $array[$value->codigo] = $value->valor;
            }
        }
        return($array);
    }
    public function load_data(Request $request){
        $indicador = $request->indicador;
        $desde = strtotime($request->desde); 
        $hasta = strtotime($request->hasta);
        for ($currentDate = $desde; $currentDate <= $hasta; $currentDate += (86400)) { 
            $save = date('d-m-Y', $currentDate); 
            $fechas[] = $save; 
        } 
        $indicators = array();
        foreach($fechas as $fecha => $value){
            $apiUrl = 'https://mindicador.cl/api/'.$indicador.'/'.$value;
            $json = file_get_contents($apiUrl);
            $indicators = json_decode($json,true);
            $array[$value] = $indicators;
        }
        return $array;        
    }
}
