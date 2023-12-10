<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];
    protected $tables = 'todos';
    public static $rules = [
        'title' => 'required|max:255',
        'content' => 'required',
    ];

    public function scopeFlg ($query, $num) {
        return $query->where('flg', $num);
    }
}
