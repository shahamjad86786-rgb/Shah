<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanySetting;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::insert([
    [
        'key'   => 'name_of_the_certifier',
        'value' => 'Rakesh Roshan',
    ],
    [
        'key'   => 'certifier_designation',
        'value' => 'MLC',
    ],
    [
        'key'   => 'certifier_address',
        'value' => 'Gulmohar Road, Dhanbad, Jharkhand',
    ],
    [
        'key'   => 'certifier_contact_number',
        'value' => '+91 1234567890',
    ],
]);
    }
}
