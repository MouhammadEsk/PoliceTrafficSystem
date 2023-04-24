<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'important',
        'title',
        'location',
        'post_date',
        'cost',
        'trial_time',
        'car_id',
        'violation_type_id',
        'province_id',
         'user_id',
    ];

   protected $casts=['post_date'];

/**
 * Get the province that owns the violation
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function province()
{
    return $this->belongsTo(province::class);
}

/**
 * Get the user that owns the violation
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    return $this->belongsTo(User::class);
}

/**
 * Get the user associated with the violation
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */

 /**
  * Get the user that owns the violation
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function car()
 {
     return $this->belongsTo(car::class);
 }

 /**
  * Get the user that owns the violation
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function violation_type()
 {
     return $this->belongsTo(violation_type::class);
 }

}
