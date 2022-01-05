<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use ShieldForce\AutoValidation\Traits\TraitStartInterception;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,TraitStartInterception;

    public static function rulesCustom(Request $request)
    {
        return
            [
                "request"    => $request,
                "creating"   =>
                    [
                        "validations" =>
                            [
                                "name"    => ["required", "string", "max:120"],
                                "email"         => ["required", "string", "email", "max:120", "unique:users"],
                                "password"      => ["required", "string", "min:4", "confirmed"],
                            ],
                        "messages" =>
                            [
                                //"name.required" => "Campo nome é obritatório",
                                //"email.required" => "Campo email é obritatório",
                            ]
                    ],
                "retrieved:login"   =>
                    [
                        "validations" =>
                            [
                                "email"         => ["required", "string", "email", "max:120"],
                                "password"      => ["required", "string"],
                            ],
                            "messages" =>
                                [
                                    "email.required" => "Campo email é obritatório",
                                    "password.required" => "Campo senha é obritatório",
                                ]
                    ],
            ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
