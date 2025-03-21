<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class booking extends Model
{
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
           'id',
           'description',
           'user_id',
           'room_id'
        ];

        public function room(){
            return $this->hasMany('App\Models\room');
        }

        public function user(){
            return $this->hasMany('App\Models\user');
        }

       
}
