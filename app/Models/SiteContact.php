<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SiteContact extends Model
{
    protected $fillable = ['name','phone','email','contact_reason_id','message'];
}
