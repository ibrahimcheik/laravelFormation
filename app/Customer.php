<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //fillable exemple :specifie all attribute to be mass assignment explicite way
    //protected $fillable = ['name','email','active'];
    //garded exemple : nothing is guarded : specifie the attribute to not store
    protected $guarded = [];
    protected $attribute = [
        'Active' => 1
    ];
    //create specifique query to use in controller by is name

    public function getActiveAttribute($attribute)
    {
        $data= [
            '1' => 'Active',
            '0' => 'Inactive',
            '2' => 'OnProgress'
        ];
        if(!$attribute || !isset($data[$attribute]))
            return null;

       return $data[$attribute];
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
