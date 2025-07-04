<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = ['name', 'industry', 'location'];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
