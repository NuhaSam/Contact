<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','address','phone','age','user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function scopeContacts($query){
    //     $query->where('user_id',Auth::id());
    // }
}
