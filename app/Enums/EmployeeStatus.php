<?php
declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class EmployeeStatus extends Enum
{
    const layoff = 0;
    const working = 1;


    static public function getMessage($employeeStatus)
    {
        switch ($employeeStatus) {
            case 'working':
                $status = __('Đang làm việc');
                $details = __('Đang làm việc');
                break;

            case 'layoff':
                $status = __('Nghỉ việc');
                $details = __('Nghỉ việc');
                break;

            default:
                $status = __('unknown');
                $details = __('unknown_details');
                break;
        }
        return [
            'status' => $status,
            'details' => $details,
        ];
    }
    public static function values(): array{
        $keyList=EmployeeStatus::getKeys();
        $array=[];
        foreach ($keyList as $key)
        {
            $array[$key]=EmployeeStatus::getValue($key);
        }
        return $array;
    }
    public static function collectionValues(){
        $keyList=EmployeeStatus::getKeys();
        $array=[];
        foreach ($keyList as $key)
        {
            $initArray=[];
            $initArray['label']=EmployeeStatus::getMessage($key)['status'];

            $initArray['value']=EmployeeStatus::getValue($key);
            $array[]=$initArray;
        }
        return collect($array);
    }
}
