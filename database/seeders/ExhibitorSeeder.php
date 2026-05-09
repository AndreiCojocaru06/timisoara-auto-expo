<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exhibitor;
use Illuminate\Support\Str;

class ExhibitorSeeder extends Seeder
{
    public function run(): void
    {
        $exhibitors = [
            [
                'name' => 'BMW Romania',
                'email' => 'contact@bmw.ro',
                'phone' => '0721 000 001',
                'stand_number' => 'A1',
                'description' => 'Dealer oficial BMW în România.',
            ],
            [
                'name' => 'Mercedes-Benz Timișoara',
                'email' => 'contact@mercedes-tm.ro',
                'phone' => '0721 000 002',
                'stand_number' => 'A2',
                'description' => 'Dealer oficial Mercedes-Benz.',
            ],
            [
                'name' => 'Tesla Motors RO',
                'email' => 'contact@tesla.ro',
                'phone' => '0721 000 003',
                'stand_number' => 'B1',
                'description' => 'Vehicule electrice Tesla.',
            ],
            [
                'name' => 'Audi Timișoara',
                'email' => 'contact@audi-tm.ro',
                'phone' => '0721 000 004',
                'stand_number' => 'B2',
                'description' => 'Dealer oficial Audi.',
            ],
        ];

        foreach ($exhibitors as $ex) {
            Exhibitor::create([
                'name' => $ex['name'],
                'slug' => Str::slug($ex['name']),
                'email' => $ex['email'],
                'phone' => $ex['phone'],
                'stand_number' => $ex['stand_number'],
                'description' => $ex['description'],
            ]);
        }
    }
}