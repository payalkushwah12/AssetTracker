<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetimage extends Model
{
    use HasFactory;
    public function asset(){
        return $this->belongsTo(Asset::class);
    }
}
