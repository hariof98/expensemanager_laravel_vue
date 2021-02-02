<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\Expense as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Expense extends Model
{
    use HasApiTokens, Notifiable;
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_category', 'sub_category', 'expense_amount','description','mode_of_payment','status','date_and_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
