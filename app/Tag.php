<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';
    protected $fillable = ['tagtext'];
    protected $hidden = ['remember_token'];

    /**
     * A tag may belong to many events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events() {
        return $this->belongsToMany('App\Event');
    }
}
