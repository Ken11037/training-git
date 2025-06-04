<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sortable extends Model
{
    protected $table = 'sortables';

    protected $fillable = [
        'name',
        'left_x',
        'top_y',
        // 他の必要カラム
    ];

    // もしタイムスタンプを使わないなら
    public $timestamps = false;
}
