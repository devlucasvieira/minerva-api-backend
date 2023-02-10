<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function contatos(): BelongsTo
    {
        return $this->hasMany(Contato::class);
    }
}
