<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(mixed $id)
 */
class Contact extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];
    protected $table = 'contacts';
}
