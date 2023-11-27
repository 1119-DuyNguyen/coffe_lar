<?php

namespace App\Http\Services;


class GateService
{
    static function getGateDefineFromRouteName(string $nameRoute): string
    {
        //        $nameRoute="product.change-status";
        //route admin.category.index
        $last_word_start = strrpos($nameRoute, '.'); // +1 so we don't include the space in our result
        $last_word = substr($nameRoute, $last_word_start); // $last_word = PHP.

        $nameRoute = substr_replace($nameRoute, '', $last_word_start);
        //route admin.category
        //        switch ($last_word){
        //            case '':
        //            case 'change-status':
        //            case 'edit':
        //                $nameRoute=substr_replace($nameRoute,'update',$last_word_start);
        //                break;
        //
        //            case 'create':
        //                $nameRoute=substr_replace($nameRoute,'store',$last_word_start);
        //                break;

        //        }
        return $nameRoute;
    }
    static function checkIfHaveGateAdmin()
    {
    }
}
