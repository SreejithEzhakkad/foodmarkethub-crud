<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['house_name_number','postcode'];


    /**
     * Get the phones associated with the user.
     */
    public function owners()
    {
        return $this->hasMany(PropertyUser::class);
    }
}