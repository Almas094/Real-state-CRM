<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFeaturesModel extends Model
{
    use HasFactory;

    protected $table = 'sub_features';

    protected $fillable = [
        'feature_id',
        'name',
        'status',
    ];

    public function features(){
        return $this->belongsTo(FeaturesModel::class,'feature_id');
    }
}
