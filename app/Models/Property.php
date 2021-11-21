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
     * Get the owners of with property.
     */
    public function owners()
    {
        return $this->belongsToMany(User::class)->withPivot('main_owner');
    }
}