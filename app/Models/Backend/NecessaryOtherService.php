<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NecessaryOtherService extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'necessary_other_services';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','side_url','photo','status','created_by'
    ];

}
