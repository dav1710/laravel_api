<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Card::class, 'card_id', 'id');
    }
}
