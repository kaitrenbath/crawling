<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Facades\Validator;

class ScanWebsite extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:website {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scans the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rules = ['url' => 'required|url'];
        $data = Validator::make($this->arguments(), $rules)->validate();

        $this->info($data['url']);
    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'url' => 'Enter the URL (including https://)',
        ];
    }
}
