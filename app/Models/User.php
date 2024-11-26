<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Middleware\CheckSubscription;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prename',
        'name',
        'tel',
        'email',
        'matricule',
        'password',
        'statut',
        'paiement',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function articles()
    {
        return $this->hasMany(articles::class);
    }

    public function isOnTrial()
    {
        return $this->periode_essai && Carbon::now()->lessThanOrEqualTo($this->periode_essai);
    }

    public function hasPaidSubscription()
    {
        // Par exemple, vérifie un champ `subscription_status` ou une relation avec un modèle `Payment`
        return $this->subscription_status === 'active';
    }

}
