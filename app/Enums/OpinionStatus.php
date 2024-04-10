<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OpinionStatus extends Enum
{
    const pending = 0; // Dang cho nhan vien nhan
    const accepted = 1; // da duoc duyet
    const rejected = 2; // bi tu choi
    //    const dropped_off = 2;
    //Khoảng cách giao hàng tính từ cửa hàng (truyền thống) đặt hàng gần nhất nhỏ hơn hoặc bằng 2 km;

    static public function getMessage($opinionStatus)
    {
        switch ($opinionStatus) {
            case 'pending':
                $status = __('pending');
                $details = __('pending_details');
                break;

            case 'accepted':
                $status = __('accepted');
                $details = __('accepted_details');
                break;

            case 'rejected':
                $status = __('rejected');
                $details = __('rejected_details');
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
    public static function values(): array
    {
        $keyList = OpinionStatus::getKeys();
        $array = [];
        foreach ($keyList as $key) {
            $array[$key] = OpinionStatus::getValue($key);
        }
        return $array;
    }
    public static function collectionValues()
    {
        $keyList = OpinionStatus::getKeys();
        $array = [];
        foreach ($keyList as $key) {
            $initArray = [];
            $initArray['label'] = OpinionStatus::getMessage($key)['status'];

            $initArray['value'] = OpinionStatus::getValue($key);
            $array[] = $initArray;
        }
        return collect($array);
    }
}
