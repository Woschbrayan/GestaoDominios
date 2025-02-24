<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Domain;
use App\Models\User;
use App\Models\Company;
use Carbon\Carbon;

class DomainSeeder extends Seeder
{
    public function run()
    {
        // Pegar um usuário existente ou criar um novo
        $user = User::first() ?? User::factory()->create();

        // Pegar uma empresa existente ou criar uma nova
        $company = Company::first() ?? Company::create([
            'name' => 'HostGator',
            'website' => 'https://www.hostgator.com.br'
        ]);

        // Criar domínios fictícios
        Domain::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'name' => 'exemplo.com',
            'status' => 'Ativo',
            'expiration_date' => Carbon::now()->addYear(),
        ]);

        Domain::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'name' => 'meusite.net',
            'status' => 'Expirado',
            'expiration_date' => Carbon::now()->subDays(10),
        ]);

        Domain::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'name' => 'projeto.org',
            'status' => 'Pendente',
            'expiration_date' => Carbon::now()->addMonths(6),
        ]);
    }
}
