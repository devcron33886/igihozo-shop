<?php

namespace App\Models;

use Cknow\Money\Money;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Pending' => 'Pending',
        'Processing' => 'Processing',
        'On Way' => 'On Way',
        'Delivered' => 'Delivered',
        'Cancelled' => 'Cancelled',
        'Paid' => 'Paid',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_no',
        'name',
        'mobile',
        'email',
        'shipping_address',
        'notes',
        'payment_id',
        'shipping_id',
        'total',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(ShippingType::class, 'shipping_id');
    }

    public function formattedPrice(): Money
    {
        return Money::RWF($this->total);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
