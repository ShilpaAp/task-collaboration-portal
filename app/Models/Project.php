<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'developer_id',
        'client_id',
        'status',
    ];

    public function developer()
    {
        return $this->belongsTo(User::class, 'developer_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function updates()
    {
        return $this->hasMany(Update::class);
    }
}
