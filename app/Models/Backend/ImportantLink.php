<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ImportantLink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'important_links';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'link_name','side_url','status','created_by'
    ];

}
