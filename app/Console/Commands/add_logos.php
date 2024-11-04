<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use App\Models\Maker;
 
class add_logos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add_logos';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
 
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $makers = Maker::all();
        for ($i=0; $i < count($makers); $i++)
        {
            $makers[$i]->logo = $makers[$i]->name.".png"; 
            $makers[$i]->save();
        }
    }
}
 