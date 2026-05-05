<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSkillDeduplicateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remove duplicate educations (keep lowest id) based on institution
        $eduDuplicates = DB::select("SELECT institution, GROUP_CONCAT(id ORDER BY id) as ids, MIN(id) as keep_id, COUNT(*) as cnt FROM educations GROUP BY institution HAVING COUNT(*) > 1");
        foreach ($eduDuplicates as $row) {
            $ids = explode(',', $row->ids);
            $keep = (int) $row->keep_id;
            foreach ($ids as $id) {
                $id = (int) $id;
                if ($id !== $keep) {
                    DB::table('educations')->where('id', $id)->delete();
                }
            }
        }

        // Remove duplicate skills (keep lowest id) based on name+type
        $skillDuplicates = DB::select("SELECT name, type, GROUP_CONCAT(id ORDER BY id) as ids, MIN(id) as keep_id, COUNT(*) as cnt FROM skills GROUP BY name, type HAVING COUNT(*) > 1");
        foreach ($skillDuplicates as $row) {
            $ids = explode(',', $row->ids);
            $keep = (int) $row->keep_id;
            foreach ($ids as $id) {
                $id = (int) $id;
                if ($id !== $keep) {
                    DB::table('skills')->where('id', $id)->delete();
                }
            }
        }
    }
}
