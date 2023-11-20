<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_receiver',
        'address_receiver',
        'phone_receiver',
        'email_receiver',
        'note',
        'sub_total',
        'fee_ship',
        'total',
        'payment_status',
        'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Mutator for 'name_receiver'
    public function setNameReceiverAttribute($value)
    {
        $this->attributes['name_receiver'] = $value;
    }

    // Mutator for 'address_receiver'
    public function setAddressReceiverAttribute($value)
    {
        $this->attributes['address_receiver'] = $value;
    }

    // Mutator for 'phone_receiver'
    public function setPhoneReceiverAttribute($value)
    {
        $this->attributes['phone_receiver'] = $value;
    }

    // Mutator for 'email_receiver'
    public function setEmailReceiverAttribute($value)
    {
        $this->attributes['email_receiver'] = $value;
    }

    // Mutator for 'note'
    public function setNoteAttribute($value)
    {
        $this->attributes['note'] = $value;
    }

    // Mutator for 'sub_total', 'fee_ship', 'total'
    public function setSubTotalAttribute($value)
    {
        $this->attributes['sub_total'] = $value;
    }

    public function setFeeShipAttribute($value)
    {
        $this->attributes['fee_ship'] = $value;
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value;
    }

    // Mutator for 'payment_status', 'order_status'
    public function setPaymentStatusAttribute($value)
    {
        $this->attributes['payment_status'] = $value;
    }

    public function setOrderStatusAttribute($value)
    {
        $this->attributes['order_status'] = $value;
    }


    // Accessor for 'name_receiver'
    public function getNameReceiverAttribute($value)
    {
        return $value;
    }

    // Accessor for 'address_receiver'
    public function getAddressReceiverAttribute($value)
    {
        return $value;
    }

    // Accessor for 'phone_receiver'
    public function getPhoneReceiverAttribute($value)
    {
        return $value;
    }

    // Accessor for 'email_receiver'
    public function getEmailReceiverAttribute($value)
    {
        return $value;
    }

    // Accessor for 'note'
    public function getNoteAttribute($value)
    {
        return $value;
    }

    // Accessor for 'sub_total', 'fee_ship', 'total'
    public function getSubTotalAttribute($value)
    {
        return $value;
    }

    public function getFeeShipAttribute($value)
    {
        return $value;
    }

    public function getTotalAttribute($value)
    {
        return $value;
    }

    // Accessor for 'payment_status', 'order_status'
    public function getPaymentStatusAttribute($value)
    {
        return $value;
    }

    public function getOrderStatusAttribute($value)
    {
        return $value;
    }
}
