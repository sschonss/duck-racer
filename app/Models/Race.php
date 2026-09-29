<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Race extends Model { protected $fillable=['code','status','names','results']; protected $casts=['names'=>'array','results'=>'array']; }
