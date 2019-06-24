<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     protected $fillable = [
        'emp_id ', 'att_date', 'att_month','att_year',' attendance ',' edit_date ',
    ];
}
