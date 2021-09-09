<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'company_id',
        'city_id',
        'title',
        'intro',
        'description',
        'contact',
        'type'
    ];

    public function company(){
        return $this->belongsTo( Company::class );
    }

    public function city(){
        return $this->belongsTo( City::class );
    }
}
