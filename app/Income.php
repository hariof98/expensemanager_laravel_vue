<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\Income as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Income extends Model
{
    use HasApiTokens, Notifiable;
    /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'income', 'source_of_income', 'name_of_the_bank','monthly_budget_allocation','savings_amount',
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
    
