<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function judges()
    {
        return $this->hasMany(Judge::class);
    }
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
