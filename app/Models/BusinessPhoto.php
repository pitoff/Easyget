<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPhoto extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'category_id', 'business_id', 'photos', 'description'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
