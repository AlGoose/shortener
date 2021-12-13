<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['client_ip'];
    
    public function shortLink()
    {
        return $this->belongsTo(ShortLink::class);
    }
}
