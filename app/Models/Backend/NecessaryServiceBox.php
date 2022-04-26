<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NecessaryServiceBox extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'necessary_service_boxes';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    /* protected $fillable = [
        'link_name','side_url','status','created_by'
    ]; */

}
