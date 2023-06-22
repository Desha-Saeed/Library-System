<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date', 'brief'];
    public function book(): HasMany
    {
        return $this->hasMany(books::class);
    }
}
