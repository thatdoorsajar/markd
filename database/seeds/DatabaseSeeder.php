<?php

use Illuminate\Database\Seeder;

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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('password_resets')->truncate();
        DB::table('folders')->truncate();
        DB::table('bookmarks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Accounts\User::class, 5)->create()->each(function ($u) {
            // $u->folders()->saveMany(
            //     factory(App\Markd\Folder::class, 10)
            //         ->create(['user_id' => $u->id])
            //         ->each(function ($f) use ($u) {
            //             $f->bookmarks()->saveMany(
            //                 factory(App\Markd\Bookmark::class, 10)->create([
            //                     'folder_id' => $f->id,
            //                     'user_id'   => $u->id,
            //                 ])
            //             );
            //         })
            // );
        });
    }
}
