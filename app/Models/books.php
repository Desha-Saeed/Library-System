<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class books extends Model
{
    // protected $fillable = array('*');
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'foreign_key');
    }



    public function Auther(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'foreign_key');
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
