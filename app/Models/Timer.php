<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $table = 'timers';

    protected $fillable = ['name', 'user_id', 'project_id', 'start_at', 'stopped_at'];

    protected $with = ['user'];

    /**
     * Get related user
     */

     public function user() {
        return $this->belongsTo(User::class); 
     }

    /**
     * Get related project
    */

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
