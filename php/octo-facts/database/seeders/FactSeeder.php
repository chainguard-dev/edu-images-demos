<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $octoFacts = $this->getQuotes();

        foreach ($octoFacts as $fact) {
            DB::table('facts')->insert([
                'fact' => $fact
            ]);
        }

    }

    /**
     * @throws \Exception
     */
    public function getQuotes(): array
    {
        $quotesFile = __DIR__ . '/../../octofacts.txt';
        $quotes = [];

        if (!is_file($quotesFile)) {
            throw new \Exception("OctoFacts file not found.");
        }

        $file = fopen($quotesFile, "r");
        while (($buffer = fgets($file, 4096)) !== false) {
            $quotes[] = $buffer;
        }

        return $quotes;
    }
}
