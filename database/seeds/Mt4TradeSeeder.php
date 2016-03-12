<?php

use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::unprepared(file_get_contents(__DIR__ . '/cmsPortoTheme.sql'));
        $sql = file_get_contents(__DIR__ . '/splitMt4TradeToManyTables.sql');

//        if (! str_contains($sql, ['DELETE', 'TRUNCATE'])) {
//            throw new Exception('Invalid sql file. This will not empty the tables first.');
//        }

        // split the statements, so DB::statement can execute them.
        $statements = array_filter(array_map('trim', explode('--|||', $sql)));

        foreach ($statements as $stmt) {
            DB::unprepared($stmt);
        }
    }
}
