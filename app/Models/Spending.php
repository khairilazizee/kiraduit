<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spending extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_date', 'end_date', 'start_money', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function SpendingDetails()
    {
        return $this->hasMany(SpendingDetail::class);
    }
}
