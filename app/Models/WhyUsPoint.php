<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WhyUsPoint extends Model {
    protected $table = 'why_us_points';
    protected $fillable = ['icon','title','description','sort_order'];
}
