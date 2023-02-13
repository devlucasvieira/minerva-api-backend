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

	public function pessoa()
	{
		return $this->hasOne(Pessoa::class, "id", "pessoa_id");
	}

    public function tipoContato(): HasOne
    {
        return $this->hasOne(TipoContato::class, "id", "tipo_contato_id");
    }

}
