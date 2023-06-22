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
        return $this->belongsTo(Category::class);
    }

    public function Auther()
    {
        return $this->belongsTo(Author::class);
    }





    // public function author():BelongsTo
    // {
    //     return $this->belongsTo(Author::class);
    // }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class);
    // }


}
