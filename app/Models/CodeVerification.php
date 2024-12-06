<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeVerification extends Model
{
    use \Illuminate\Notifications\Notifiable;
    use HasFactory;

    protected $fillable = [
        'code',

        'email',
    ];
}
