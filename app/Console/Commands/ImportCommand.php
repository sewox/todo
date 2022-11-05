<?php

namespace App\Console\Commands;

use App\Services\Task\Data\TaskProviderBuilder;
use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:provider {--provider=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch provider tasks.';
    protected $option;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $provider = "App\\Services\\Task\\Data\\" . $this->option('provider');
        (new TaskProviderBuilder)->execute(new $provider);

        return 0;
    }
}
