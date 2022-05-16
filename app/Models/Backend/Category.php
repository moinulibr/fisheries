<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use Illuminate\Database\Eloquent\SoftDeletes; 
class Category extends Model
{
    use HasFactory;
     use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'categories';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'name','slug','parent_id','description','photo','status','created_by'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    } 
}
