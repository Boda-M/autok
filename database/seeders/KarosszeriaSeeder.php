<?php

namespace Database\Seeders;

use App\Models\Karosszeria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KarosszeriaSeeder extends Seeder
{
    const ITEMS = [
        'Crossover',
        'Fastback',
        'Hardtop',
        'Hatchback',
        'Kabrió',
        'Kombi',
        'Kupé',
        'Liftback',
        'Limuzin',
        'Minivan',
        'Pickup',
        'Roadster',
        'Szedán',
        'Targa',
    ];
    public function run(): void
    {
        foreach(self::ITEMS as $item){
            $entity=new Karosszeria( ['name' => $item]);
            $entity->save();
        }
    }
}
