<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'businesses';

    public $fillable = [
        'user_id', 'category_id', 'business_name', 'description', 'land_mark', 'address', 'contact'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function businessPhotos()
    {
        return $this->hasMany(BusinessPhoto::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
