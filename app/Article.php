<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
  protected $table = 'articles';

  protected $fillable = array('title','content','author_id');

  public $timestamps = true;

  public function Author(){
        return $this->belongsTo(User::class,'author_id');
  }
}
