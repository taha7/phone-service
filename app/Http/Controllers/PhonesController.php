<?php

namespace App\Http\Controllers;

use App\Filters\CountryFilter;
use App\Filters\StatusFilter;
use App\Models\PhoneInCountry;
use Illuminate\Support\Facades\DB;

class PhonesController extends Controller
{
    public function index()
    {
        if (request()->wantsJson()) {
            $countries = PhoneInCountry::select(DB::raw("DISTINCT(country)"))->pluck('country');
            return response()->json([
                'phones' => PhoneInCountry::withFilters($this->getFilters(), request())->paginate(10),
                'countries' => $countries
            ]);
        }
        return view('phones.index');
    }

    /**
     * get allowed filters for phone list
     */
    private function getFilters()
    {
        return [
            'countries' => new CountryFilter(),
            'status' => new StatusFilter()
        ];
    }
}
