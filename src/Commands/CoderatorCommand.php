<?php

namespace KaanTanis\Coderator\Commands;

use Illuminate\Console\Command;

class CoderatorCommand extends Command
{
    public $signature = 'coderator';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
