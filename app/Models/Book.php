<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator',
        'depNameEn',
        'depName',
        'toPerson',
        'variableName',
        'signDate',
        'content',
        'thanks',
        'greeting',
        'toDo',
        'attach',
        'signatory',
        'image',
        'position',
    ];
}



