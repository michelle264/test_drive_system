<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone_number', 'email', 'test_drive_date', 'test_drive_time', 'down_payment_amount', 'purchase_status', 'loan_amount'
    ];
}

