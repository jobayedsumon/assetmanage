<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, AssetAssignment::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class)->orderBy('transferred_date', 'ASC')->orderBy('created_at', 'ASC');
    }
}
