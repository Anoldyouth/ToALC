<?php

namespace App\Console\Commands;

use App\Actions\InterpreterAction;
use Illuminate\Console\Command;

class InterpreterCommand extends Command
{
    public function __construct(
        protected InterpreterAction $action,
    ) {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'toalc:interpreter {grammar_path} {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Интерпретатор';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $grammarPath = $this->argument('grammar_path');
        $filePath = $this->argument('file_path');

        $result = $this->action->execute($grammarPath, $filePath);

        foreach ($result['errors'] ?? [] as $error) {
            $this->error(var_export($error, true));
        }
    }
}
