<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;



    protected $fillable = [
        'title',       // タスク名
        'user_id',     // 担当者ID
        'status',      // ステータス
        'comment',     // 備考
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
