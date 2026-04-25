<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FooterLink extends Model {
    protected $fillable = ['column','label','url','sort_order','active'];
}
