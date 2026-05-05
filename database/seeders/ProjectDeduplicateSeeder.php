<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDeduplicateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remove duplicate projects (keep lowest id) based on title
        $duplicates = DB::select("SELECT title, GROUP_CONCAT(id ORDER BY id) as ids, MIN(id) as keep_id, COUNT(*) as cnt FROM projects GROUP BY title HAVING COUNT(*) > 1");

        foreach ($duplicates as $row) {
            $ids = explode(',', $row->ids);
            $keep = (int) $row->keep_id;
            foreach ($ids as $id) {
                $id = (int) $id;
                if ($id !== $keep) {
                    DB::table('projects')->where('id', $id)->delete();
                }
            }
        }
    }
}
