<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['category'];
    public function food(){
        return $this->hasMany(Food::class);
    }
}
