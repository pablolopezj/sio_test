<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'assigned_time', 'user_id'];

    protected $with = ['user'];

    /**
     * Get associated user
     */

     public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get associated timers
     */

     public function timers(){
        return $this->hasMany(Timer::class);
     }

      /**
      * Get my projects
      */

    public function scopeMine($query){
        return $query->whereUserId(auth()->user()->id);
    }
}
