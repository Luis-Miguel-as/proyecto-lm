<?php

use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->truncateTablas([
            'rol',
            'permiso'
        ]);
        $this->call(TablaRolSeeder::class);
        $this->call(TablaPermisoSeeder::class);
    }
    protected function truncateTablas(array $tablas){
        DB::statement('SET FOREIGN_KEY_CHECKS =0;');
        Foreach ($tablas AS $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS =1;');
    }
}
