<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = ['source_link', 'code', 'type', 'stats_link', 'expiry_date'];

    public function views()
    {
        return $this->hasMany(View::class);
    }
}
