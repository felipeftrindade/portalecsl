<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{

  protected $fillable = array('url', 'title', 'description', 'content', 'image', 'blog', 'category_id', 'author_id');

  public static function prevBlogPostUrl($id) {
      $blog = static::where('id', '<', $id)->orderBy('id', 'desc')->first();

      return $blog ? $blog->url : '#';
  }

  public static function nextBlogPostUrl($id) {
      $blog = static::where('id', '>', $id)->orderBy('id', 'asc')->first();

      return $blog ? $blog->url : '#';
  }

  public function tags() {
      return $this->belongsToMany('App\BlogTag','blog_post_tags','post_id','tag_id');
  }

  public function Author(){
        return $this->belongsTo(User::class,'author_id');
  }
}
