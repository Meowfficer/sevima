<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleKelas extends Model
{
    use HasFactory;

    public function mapelKelas()
    {
        return $this->hasOne(KelasMapel::class, 'id', 'kelas_mapel_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
