<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendingDetail extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'spending_date', 'spending_amount', 'remarks', 'spending_id'];

    public function Spending()
    {
        return $this->belongsTo(Spending::class);
    }
}
