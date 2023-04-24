<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'brand',
        'type',
        'color',
        'category',
        'year',
        'model',
        'province_id',
        'user_id',

    ];

    /**
     * Get the user that owns the car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(user::class,);
    }

    /**
     * Get the user that owns the car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(province::class);
    }

  //  protected $casts=['dead_line'];

}
