<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 1000) as $item) {
            $data = new \App\User();
            $data->name = 'test_' . $item;
            $data->email = 'test@gmail' . $item . '.com';
            $data->password = bcrypt('123456');
            $data->status = 1;
            $data->is_admin = 0;
            $data->photo_url = 'photos/uploads/contents/1509294852-59f603044fc4d.jpg';
            $data->save();
        }
    }
}
