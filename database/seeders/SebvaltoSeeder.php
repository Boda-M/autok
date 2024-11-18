<?php

namespace Database\Seeders;

use App\Models\Sebvalto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SebvaltoSeeder extends Seeder
{
    const ITEMS = [
        'mechanikus',
        'félautomata',
        'automata',
        'szekvenciális',
    ];
    public function run(): void
    {
        foreach(self::ITEMS as $item){
            $entity=new Sebvalto( ['name' => $item]);
            $entity->save();
        }
    }
}
