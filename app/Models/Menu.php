<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded = ['id'];

    public function parentName(){
        return $this->hasOne(Menu::class, 'id','parent');
    }

    public function SubPages(){
        return $this->hasMany(Menu::class, 'parent','id')->orderBy('id');
    }
}

?>
