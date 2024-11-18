<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    const ITEMS = [
        [
            'name' => 'fehér',
            'hexa_code' => '#FFFFFF',
        ],
        [
            'name' => 'sárga',
            'hexa_code' => '#FFFF00',
        ],
        [
            'name' => 'narancs',
            'hexa_code' => '#FFA500',
        ],
        [
            'name' => 'piros',
            'hexa_code' => '#FF0000',
        ],
        [
            'name' => 'bíbor / lila',
            'hexa_code' => '#800080',
        ],
        [
            'name' => 'kék',
            'hexa_code' => '#0000FF',
        ],
        [
            'name' => 'zöld',
            'hexa_code' => '#008000',
        ],
        [
            'name' => 'szürke',
            'hexa_code' => '#808080',
        ],
        [
            'name' => 'barna',
            'hexa_code' => '#A52A2A',
        ],
        [
            'name' => 'fekete',
            'hexa_code' => '#000000',
        ],
    ];
    public function run(): void
    {
        foreach(self::ITEMS as $item){
            $entity=new Color( ['name' => $item['name'],'hexa_code'=>$item['hexa_code']]);
            $entity->save();
        }
    }
}
