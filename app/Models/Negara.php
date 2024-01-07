<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
        use HasFactory;

        protected $table = 'negara';
        protected $fillable = [
                'nama',
                'flag'
        ];

        protected $hidden = [
                'created_at',
                'updated_at',
        ];

        public function regresi()
        {
                return $this->hasMany('App\Models\Regresi', 'negara_id', 'id');
        }
}
