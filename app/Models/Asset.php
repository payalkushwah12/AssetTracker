<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    public function assettype(){
        return $this->belongsTo(Assettype::class);
    }
    public function assetimages(){
        return $this->hasMany(Assetimage::class);
    }

}
