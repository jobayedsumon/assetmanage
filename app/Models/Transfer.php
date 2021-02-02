<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function from_employee()
    {
        return $this->belongsTo(Employee::class, 'transferred_from');
    }

    public function to_employee()
    {
        return $this->belongsTo(Employee::class, 'transferred_to');
    }

}
