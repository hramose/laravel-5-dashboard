<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

    /**
     * @var array
     */
    protected $tables = ['users', 'posts', 'password_resets', 'categories', 'categorizables', 'tags', 'taggables',
        'comments', 'commentables'];

    /**
     * @var array
     */
    protected $seeders = ['UsersTableSeeder', 'CategoriesTableSeeder', 'TagsTableSeeder', 'CommentsTableSeeder',
        'PostsTableSeeder'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }
    }

    /**
     * clean out the database before start seeding
     */
    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
