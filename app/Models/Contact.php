<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(mixed $id)
 */
class Contact extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'contacts';
}
