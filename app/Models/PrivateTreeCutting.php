<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateTreeCutting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'admin_id',
        'app_letter',
        'app_letter_compliant',
        'app_letter_remarks',
        'land_Title',
        'land_Title_compliant',
        'land_Title_remarks',
        'endorsement_Certification',
        'endorsement_Certification_compliant',
        'endorsement_Certification_remarks',
        'homeowner_Reso',
        'homeowner_Reso_compliant',
        'homeowner_Reso_remarks',
        'resolution',
        'resolution_compliant',
        'resolution_remarks',
        'status',
        'app_Date',
        'app_Loc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}