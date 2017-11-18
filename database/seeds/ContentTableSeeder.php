<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 1000) as $item) {
            $data = new \App\Content();
            $data->name = 'test_' . $item;
            $data->status = 1;
            $data->photo_url = 'http://geeksnation.org/wp-content/uploads/2016/10/Beautiful-Girl.jpg';
            $data->save();
        }

    }
}
