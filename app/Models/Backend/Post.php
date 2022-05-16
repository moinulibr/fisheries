<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use Illuminate\Database\Eloquent\SoftDeletes; 
class Post extends Model
{
    use HasFactory;
     use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'posts';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','slug','description','featured_image','status','categories','created_by'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    } 
}
