<?php

namespace App\Http\Services;


class GateService
{
    static function getGateDefineFromRouteName(string $nameRoute): string
    {
        //        $nameRoute="product.change-status";
        //route admin.categories.index
        $last_word_start = strrpos($nameRoute, '.') + 1; // +1 so we don't include the dot in our result
        $last_word = substr($nameRoute, $last_word_start); // $last_word = PHP.
//        $nameRoute = substr_replace($nameRoute, '', $last_word_start - 1);
        //route admin.category
        switch ($last_word) {
            case 'index':
            case 'edit':
            case 'create':
                $nameRoute = substr_replace($nameRoute, 'read', $last_word_start);
                break;
            case 'change-status':
                $nameRoute = substr_replace($nameRoute, 'update', $last_word_start);
                break;

//                $nameRoute = substr_replace($nameRoute, 'store', $last_word_start);
//                break;
        }
        return $nameRoute;
    }

    static function checkIfHaveGateAdmin()
    {
    }
}
