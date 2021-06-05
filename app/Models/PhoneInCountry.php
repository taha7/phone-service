<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class PhoneInCountry extends Model
{
    use Filterable;

    protected $table = 'phone_in_country_view';
}
