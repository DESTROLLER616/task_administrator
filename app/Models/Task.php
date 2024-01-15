<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
        'company_id',
        'starts_at',
        'expired_at',
        'is_completed'
    ];

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }
}
