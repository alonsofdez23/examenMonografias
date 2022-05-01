<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monografia extends Model
{
    use HasFactory;

    protected $table = 'monografias';

    public $fillable = [
        'titulo',
        'anyo'
    ];

    /**
     * The articulos that belong to the Monografia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articulos()
    {
        return $this->belongsToMany(Articulo::class);
    }

    public function autores()
    {
        $col = collect();

        foreach ($this->articulos as $articulo) {
            $col = $col->merge($articulo->autores);
        }

        return $col->unique('id');
    }
}
