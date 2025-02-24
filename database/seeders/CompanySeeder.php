<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            ['name' => 'UOL Host', 'website' => 'https://www.uolhost.com.br'],
            ['name' => 'DialHost', 'website' => 'https://www.dialhost.com.br'],
            ['name' => 'AWS', 'website' => 'https://aws.amazon.com'],
            ['name' => 'HostGator', 'website' => 'https://www.hostgator.com.br'],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
