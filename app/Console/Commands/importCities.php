<?php

namespace App\Console\Commands;

use App\DataServices\Contracts\CityDataServiceContract;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\BindingResolutionException;

class importCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cities:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all belgian cities to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function handle()
    {
        $cities = json_decode(file_get_contents('public/data/zipcode-belgium.json'));

        foreach ($cities as $city) {

            $data = [
                'name' => $city->city,
                'zip' => $city->zip
            ];

            app()->make(CityDataServiceContract::class)->create($data);
        }

        echo PHP_EOL . 'Cities imported';
    }
}
