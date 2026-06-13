<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WordCounterInFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:count-words {filename : Le chemin vers le fichier}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Word counter in a file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = $this->argument('filename');

        if (!file_exists($filename)) {
            $this->error("Le fichier '{$filename}' n'existe pas.");
            return 1;
        }

        $wordCount = 0;
        $handle = fopen($filename, 'r');

        while (($line = fgets($handle)) !== false) {
            $wordCount += preg_match_all('/\p{L}+/u', $line);
        }

        fclose($handle);

        $this->info("Fichier : {$filename}");
        $this->info("Nombre de mots : {$wordCount}");

        return $wordCount;
    }
}
