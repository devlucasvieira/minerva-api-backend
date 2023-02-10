<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'informacao',
        'pessoa_id',
        'tipo_contato_id'
    ];

     /**
     * @return HasOne
     * @description get the category for the blog post.
     */
    public function pessoa(): HasOne
    {
        return $this->belongsTo(Pessoa::class);
    }

     /**
     * @return BelongsTo
     * @description get the category for the blog post.
     */
    public function tipoContato(): HasOne
    {
        return $this->belongsTo(TipoContato::class);
    }

}
