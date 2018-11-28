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
        DB::table('domains')->truncate();
        DB::table('folders')->truncate();
        DB::table('bookmarks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->seedUserAccount('jpearson@ec4p.com');
        $this->seedUserAccount('jgpearson1@gmail.com');
    }

    private function seedUserAccount($userEmail)
    {
        $user = factory(App\Accounts\User::class)->create(['email' => $userEmail]);

        $topFolder = factory(App\Mrkd\Folder::class)->create([
            'user_id'   => $user->id,
            'top_folder' => true,
        ]);

        $user->bookmarks()->saveMany(
            factory(App\Mrkd\Bookmark::class, 3)->create([
                'folder_id' => $topFolder->id,
            ])
        );

        $user->folders()->saveMany(
            factory(App\Mrkd\Folder::class, 3)
                ->create([
                    'user_id'   => $user->id,
                    'parent_id' => $topFolder->id
                ])
                ->each(function ($folder) use ($user) {
                    $folder->appendNode(
                        factory(App\Mrkd\Folder::class)->create(['user_id' => $user->id])
                    );

                    $folder->bookmarks()->saveMany(
                        factory(App\Mrkd\Bookmark::class, 3)->create([
                            'folder_id' => $folder->id,
                            'user_id'   => $user->id,
                        ])
                    );
                })
        );
    }
}
