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
                $status = __('order_status.pending');
                $details = __('order_status.pending_details');
                break;

            case 'processed_and_ready_to_ship':
                $status = __('order_status.processed_and_ready_to_ship');
                $details = __('order_status.processed_and_ready_to_ship_details');
                break;

            case 'dropped_off':
                $status = __('order_status.dropped_off');
                $details = __('order_status.dropped_off_details');
                break;

            case 'shipped':
                $status = __('order_status.shipped');
                $details = __('order_status.shipped_details');
                break;

            case 'out_for_delivery':
                $status = __('order_status.out_for_delivery');
                $details = __('order_status.out_for_delivery_details');
                break;

            case 'delivered':
                $status = __('order_status.delivered');
                $details = __('order_status.delivered_details');
                break;

            case 'canceled':
                $status = __('order_status.canceled');
                $details = __('order_status.canceled_details');
                break;

            default:
                $status = __('order_status.unknown');
                $details = __('order_status.unknown_details');
                break;
        }
        return [
            'status' => $status,
            'details' => $details,
        ];
    }
}
