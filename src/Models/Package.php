<?php

namespace Esense\Package\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {

    protected $fillable = [
        'name', 'description'
    ];

}
