<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table='articles';

    protected $fallable=[
        'titre',
        'contenu',
    ];
     public function user(){
        return $this->belongsTo(User::class,'user_id');
     }

     public function commentaire(){
        return $this->hasMany(Commentaire::class,'article_id');
     }
     
}
