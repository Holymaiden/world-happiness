<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regresi extends Model
{
        use HasFactory;

        protected $table = 'regresi';
        protected $fillable = [
                'negara_id',
                'tahun',
                'ekonomi',
                'kesehatan',
                'kebebasan',
        ];

        protected $hidden = [
                'created_at',
                'updated_at',
        ];

        public function negara()
        {
                return $this->hasOne('App\Models\Negara', 'id', 'negara_id');
        }
}
