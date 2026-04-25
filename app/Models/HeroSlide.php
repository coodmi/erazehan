<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HeroSlide extends Model {
    protected $fillable = ['image_url','title','highlight','subtitle','btn1_text','btn1_link','btn2_text','btn2_link','sort_order','active'];
}
