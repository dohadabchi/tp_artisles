<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //
    protected $table='commentaires';

    protected $fallable=[
        'contenu',
    ];

    public function article(){
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function userarticle(){
        return $this->belongsTo(User::class,'user_id');
    }
}
