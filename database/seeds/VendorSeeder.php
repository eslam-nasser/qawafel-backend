<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            'name' => 'Vendor #1',
            'logo' => 'http://acmelogos.com/images/logo-3.svg'
        ]);
    }
}
