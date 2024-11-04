<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Maker;
use function Laravel\Prompts\progress;

class get_makers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_makers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    private $progress;
    public function handle()
    {
        $data=$this->getCsvData("car-db.csv");
        $makers=$this->getMakers($data);
        
        $this->progress = progress('Updating makers', count($makers));
        for ($i=0; $i < count($makers); $i++) { 
            $entity=new Maker();
            $entity->name=$makers[$i];  
            $entity->save();
            $this->progress->advance();
        }
    }
    private function getCsvData($filename){
        $f = fopen($filename,"r");
        $result=[];
        while(!feof($f)){
            $sor=fgetcsv($f);
            $result[]=$sor;
        }
        fclose($f);
        return $result;
    }
    private function getMakers($data){
        $makers = [];
        for ($i=0; $i < count($data); $i++) {
            $maker = $data[$i][1]; 
            if(array_search($maker, $makers) === false){
                $makers[] = $maker;
            }
        }
        return $makers;
    }
}
