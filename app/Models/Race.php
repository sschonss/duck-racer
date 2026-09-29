<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Race extends Model { protected $fillable=['code','status','names','results','sessions']; protected $casts=['names'=>'array','results'=>'array','sessions'=>'array']; }
