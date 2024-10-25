<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'customer_id', 'total_discount', 'total_vat', 'grand_total'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
