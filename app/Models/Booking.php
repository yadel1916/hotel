<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Reserva extends Model
{
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
           
           'appoiment',
           'description'
        ];

        public function room(){
            return $this->hasMany('App\Models\room');
        }

        public function user(){
            return $this->hasMany('App\Models\user');
        }

       
}
