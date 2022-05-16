<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Media extends Model
{
    use HasFactory;
     use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'medias';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','photo','status','created_by'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
