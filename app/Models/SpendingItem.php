<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendingItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'spending_amount', 'remarks', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
