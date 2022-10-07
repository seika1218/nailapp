<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class Nail extends Model
{
    // use HasFactory;

    protected $table = 'nails';

    protected $fillable = [
        'img_path','explanation','nailist_id',
    ];

    

    protected $appends = [
        'likes_count', 'liked_by_user',
      ];
  

      public function likes()
      {
          return $this->hasMany('App\Models\Like');
      }
      //後でViewで使う、いいねされているかを判定するメソッド。
      public function isLikedBy($user,$nail_id): bool {
          return Like::where('user_id', $user->id)->where('nail_id', $nail_id)->first() !==null;
      }
}