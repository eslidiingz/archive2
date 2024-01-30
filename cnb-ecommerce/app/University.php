<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'university';

    protected $fillable = [
        'id',
        'university_name',
        'fullname1',
        'studentid1',
        'position1',

        'fullname2',
        'studentid2',
        'position2',
        
        'fullname3',
        'studentid3',
        'position3',
        
        'fullname4',
        'studentid4',
        'position4',
        
        'fullname5',
        'studentid5',
        'position5',
        'vendor_id',
        'group_name',
        
    ];
}
