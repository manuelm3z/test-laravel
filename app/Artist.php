<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "artists";

    protected $fillable = array('name', 'rol');

    /**
     * Get the album that owns the artist.
     */
    public function album() {
        return $this->belongsTo('App\Album');
    }
}
