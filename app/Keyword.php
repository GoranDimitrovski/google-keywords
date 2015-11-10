<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model {

    protected $table = 'keywords';
    protected $fillable = ['value'];

    public function links() {
        return $this->hasMany('Link');
    }

}
