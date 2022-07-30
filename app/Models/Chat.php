<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = "chat";
    protected $guarded = [
        "id"
    ];
    public $timestamps = false;
    
   //relacion uno a muchos inversa
   public function user(){
    return $this->belongsTo(User::class);
}
}
