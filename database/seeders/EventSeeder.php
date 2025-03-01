<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            [
                'type' => 'entretenimento',
                'name' => 'Festival de Rock da Cidade',
                'description' => 'Um festival com várias bandas locais.',
                'address' => 'Av. Principal, 500 - São Paulo - SP, 01000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(15)->format('Y-m-d H:i:s'),
                'price' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'corporativo',
                'name' => 'Inteligência Artificial no Dia a Dia',
                'description' => 'Palestra sobre IA aplicada em diversas áreas.',
                'address' => 'Rua das Inovações, 123 - Rio de Janeiro - RJ, 22000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(35)->format('Y-m-d H:i:s'),
                'price' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'cultural',
                'name' => 'Feira Gastronômica de Verão',
                'description' => 'Comidas típicas, food trucks e música ao vivo.',
                'address' => 'Praça Central, 45 - Curitiba - PR, 80000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(29)->format('Y-m-d H:i:s'),
                'price' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'corporativo',
                'name' => 'Aprenda a Programar em PHP',
                'description' => 'Workshop prático para iniciantes em PHP e Laravel.',
                'address' => 'Rua dos Devs, 321 - Belo Horizonte - MG, 31000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(40)->format('Y-m-d H:i:s'),
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'entretenimento',
                'name' => 'Noites de Comédia com João Silva',
                'description' => 'Um show de stand-up com os melhores humoristas.',
                'address' => 'Teatro Central, 89 - Porto Alegre - RS, 90000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(48)->format('Y-m-d H:i:s'),
                'price' => 40.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'cultural',
                'name' => 'Clássicos do Cinema: Sessão Nostalgia',
                'description' => 'Exibição de filmes clássicos ao ar livre com pipoca grátis.',
                'address' => 'Parque da Cidade, 200 - Florianópolis - SC, 88000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(22)->format('Y-m-d H:i:s'),
                'price' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'corporativo',
                'name' => 'Maratona de Programação 2025',
                'description' => 'Desafio de 24 horas para resolver problemas de tecnologia.',
                'address' => 'Universidade Tech, 77 - Campinas - SP, 13000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(42)->format('Y-m-d H:i:s'),
                'price' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'social',
                'name' => 'Noite Retrô Anos 80',
                'description' => 'Festa temática com DJ tocando hits dos anos 80.',
                'address' => 'Clube Vintage, 65 - Salvador - BA, 40000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(50)->format('Y-m-d H:i:s'),
                'price' => 35.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'cultural',
                'name' => 'Arte Digital e Realidade Virtual',
                'description' => 'Mostra interativa de arte digital e experiências em VR.',
                'address' => 'Galeria Moderna, 18 - Brasília - DF, 70000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(28)->format('Y-m-d H:i:s'),
                'price' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'cultural',
                'name' => 'Fotografia para Iniciantes',
                'description' => 'Curso básico de fotografia com prática ao ar livre.',
                'address' => 'Escola de Artes, 99 - Recife - PE, 50000-000',
                'address_link' => 'https://maps.google.com',
                'start_datetime' => Carbon::now()->addDays(45)->format('Y-m-d H:i:s'),
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
