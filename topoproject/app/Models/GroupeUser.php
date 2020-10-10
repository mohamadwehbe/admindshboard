<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeUser extends Model
{
    protected $table='groupe_user';
   public function users(){
       return $this->belongsToMany('/App/Models/User');
   }
   public function groupes(){
       return $this->belongsToMany('/App/Models/Groupe');
   }

}
