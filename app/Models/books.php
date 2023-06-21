<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class books extends Model
{
    // protected $fillable = array('*');
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

    public function category()
    {
        // return $this->belongsTo(category::class);
    }

    public function Auther()
    {
        // return $this->belongsTo(Authers::class);
    }
}
