<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BlogCategory;

class Post extends Model
{
  protected $fillable = array('url', 'title', 'description', 'content', 'image', 'blog', 'category_id', 'author_id');

  public function categoria() {
      return $this->belongsTo(BlogCategory::class,'category_id');
  }

  public function Author(){
        return $this->belongsTo(User::class,'author_id');
  }
}
