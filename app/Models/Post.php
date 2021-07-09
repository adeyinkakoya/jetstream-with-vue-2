<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ]; // Make everything fillable

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $appends = [
        'permissions'
    ];

    public function getPermissionsAttribute(){
        return [
                'view'=>Auth::user()->can('view', $this)
            ];
    } 
}
