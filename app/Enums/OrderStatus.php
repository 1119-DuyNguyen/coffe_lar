<?php
declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const pending = 0; // Dang cho nhan vien nhan
    const processed_and_ready_to_ship = 1;// call để xác nhận
    const out_for_delivery = 2;// dang giao hang
    const delivered = 3;// da giao hang
    const canceled = 4;// huy
//    const dropped_off = 2;
    //Khoảng cách giao hàng tính từ cửa hàng (truyền thống) đặt hàng gần nhất nhỏ hơn hoặc bằng 2 km;

    static public function getMessage($orderStatus)
    {
        switch ($orderStatus) {
            case 'pending':
                $status = __('pending');
                $details = __('pending_details');
                break;

            case 'processed_and_ready_to_ship':
                $status = __('processed_and_ready_to_ship');
                $details = __('processed_and_ready_to_ship_details');
                break;

            case 'dropped_off':
                $status = __('dropped_off');
                $details = __('dropped_off_details');
                break;

            case 'shipped':
                $status = __('shipped');
                $details = __('shipped_details');
                break;

            case 'out_for_delivery':
                $status = __('out_for_delivery');
                $details = __('out_for_delivery_details');
                break;

            case 'delivered':
                $status = __('delivered');
                $details = __('delivered_details');
                break;

            case 'canceled':
                $status = __('canceled');
                $details = __('canceled_details');
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
        $keyList=OrderStatus::getKeys();
        $array=[];
        foreach ($keyList as $key)
        {
            $array[$key]=OrderStatus::getValue($key);
        }
        return $array;
    }
    public static function collectionValues(){
        $keyList=OrderStatus::getKeys();
        $array=[];
        foreach ($keyList as $key)
        {
            $initArray=[];
            $initArray['label']=OrderStatus::getMessage($key)['status'];

            $initArray['value']=OrderStatus::getValue($key);
            $array[]=$initArray;
        }
        return collect($array);
    }
}
