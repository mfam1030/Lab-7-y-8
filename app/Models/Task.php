<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'user_id', 'priority', 'completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
