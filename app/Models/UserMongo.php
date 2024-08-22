<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMongo extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $collection = 'usermodels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
