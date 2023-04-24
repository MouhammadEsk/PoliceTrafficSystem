<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\violation;

class violation_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cost',
        'points'
    ];


    public function violation()
    {
        return $this->hasMany(Violation::class,);
    }

}
