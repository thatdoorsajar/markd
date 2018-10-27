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

        // $this->seedTopLevelFolder();

        $this->seedUserAccount('jpearson@ec4p.com');
        $this->seedUserAccount('jgpearson1@gmail.com');
    }

    private function seedTopLevelFolder()
    {
        $folder = new \App\Markd\Folder;
        $folder->title = 'Top Level Folder';
        $folder->description = 'This is the markd top level folder. All other folders are nested set children.';
        $folder->makeRoot()->save();
    }

    private function seedUserAccount($userEmail)
    {
        $user = factory(App\Accounts\User::class)->create(['email' => $userEmail]);

        $user->bookmarks()->saveMany(
            factory(App\Markd\Bookmark::class, 3)->create([
                'folder_id' => null,
                'user_id'   => null,
            ])
        );

        $user->folders()->saveMany(
            factory(App\Markd\Folder::class, 3)
                ->create(['user_id' => $user->id])
                ->each(function ($folder) use ($user) {
                    $folder->appendNode(
                        factory(App\Markd\Folder::class)->create(['user_id' => $user->id])
                    );

                    $folder->bookmarks()->saveMany(
                        factory(App\Markd\Bookmark::class, 3)->create([
                            'folder_id' => $folder->id,
                            'user_id'   => $user->id,
                        ])
                    );
                })
        );
    }
}
