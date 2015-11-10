<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {

    protected $table = 'links';
    protected $fillable = ['keyword_id', 'rank', 'value'];

    public function keyword() {
        return $this->belongsTo('Keyword', 'keyword_id');
    }

}
