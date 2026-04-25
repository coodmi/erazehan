<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model {
    protected $fillable = ['name','visa_type','content','flag','active'];
}
