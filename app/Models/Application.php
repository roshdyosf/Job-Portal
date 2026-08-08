<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_id',
        'user_id',
        'cv_path',
        'is_sent',
    ];
    protected $casts = [
        'is_sent' => 'boolean',
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
