<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $table = 'verify_users'; 

    protected $primaryKey = 'user_id';

    public $incrementing = false; 

    protected $keyType = 'int';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
