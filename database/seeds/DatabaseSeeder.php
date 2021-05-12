<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Region;
use App\Models\County;
use App\User;
use App\Models\Cropyear;
use App\Models\Tobaccotype;
use App\Models\Farmer;
use App\Models\Station;
use App\Models\Grade;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Lorry;
use App\Models\Farminput;
use App\Models\Unit;
use App\Models\Store;
use App\Models\Balereception;
use App\Models\Bale;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        User::create([
            'name' => 'Teddius Maingi',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Password1234'),
        ]);

        Region::create([
            'region_name' => 'eastern',
            'country' => 'kenya',
        ]);

        County::create([
            'county_code' => '001',
            'county_name' => 'makueni',
            'region_id' => 1,
        ]);

        Cropyear::create([
            'slug_name' => '2010',
            'from_date' => Carbon::now(),
            'to_date' => Carbon::now(),
        ]);

        Tobaccotype::create([
            'type_name' => 'tname1',
        ]);

        Farmer::create([
            'first_name' => 'Grace',
            'middle_name' => 'Mumo',
            'last_name' => 'Teddy',
            'id_number' => 212354654,
            'mobile_number' => 54654654,
            'acrerage' => 45,
            'county_id' => 1
        ]);

        Station::create([
            'name' => 'Kola',
            'location' => 'Makueni County'
        ]);

        Grade::create([
            'grade_name' => 'Grade 1',
            'tobaccotype_id' => 1,
        ]);

        Customer::create([
            'email' => 'dsd@dsd.ds',
            'mobile_number' => 646116416,
            'company_name' => 'wewewe',
            'po_box' => 43,
            'zip_code' => 3232,
            'city' => 'fdfdfd',
            'country' => 'ffdf',
        ]);

        Product::create([
            'product_name' => 'pname1',
            'yield_percentage' => 94,
        ]);

        Lorry::create([
            'plate_number' => 'KBA 234A',
            'model' => 'MAN',
        ]);

        Farminput::create([
            'name' => 'dx74',
            'description' => 'fertlizer',
            'quantity' => 4646,
        ]);

        Unit::create([
            'unit_name' => 'kgs',
            'type_of_measure' => 'weight',
        ]);

        Store::create([
            'name' => 'Kaiti',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicinr excepturi",
        ]);

        Balereception::create([
            'station_id' => 1,
            'store_id' => 1,
            'number_of_bales' => 12,
            'officer' => 'mathwew',
            'farmer_id' => 1,
        ]);

        Bale::create([
            'number' => 'BL453',
            'grade_id' => 1,
            'weight_at_reception' => 232,
            'farmer_id' => 1,
            'balereception_id' => 1,
            'state' => 'reception',
        ]);

    }
}
