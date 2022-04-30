<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    /**
     * The autores that belong to the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autores()
    {
        return $this->belongsToMany(Autor::class);
    }

    /**
     * The monografias that belong to the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function monografias()
    {
        return $this->belongsToMany(Monografia::class);
    }
}
