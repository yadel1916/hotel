<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
class room extends Model
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
         'number_room',
         'user_name'   
      ]; 

      public function scheduling(){
         return $this->belongsTo('App\Models\Booking');
      }

      public function scopeNames($rooms, $query){
         if(trim($query)){
             $rooms->where('number_room', 'LIKE', '%' .$query. '%')
                   ->orWhere('user_name', 'LIKE', '%' .$query. '%');
         }
     }
}
