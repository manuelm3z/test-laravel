<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "albums";

    protected $fillable = array('title', 'publication');

    /**
     * Get the artists for the album.
     */
    public function artists() {
        return $this->hasMany('App\Artist');
    }
}
