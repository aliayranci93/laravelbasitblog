<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pages = ['Hakkımızda','Kariyer','Vizyon','Misyon'];
      $count=0;
      foreach ($pages as $page) {
        $count++;
        DB::table('pages')->insert([
          'title'=>$page,
          'slug'=>Str::slug($page),
          'image'=>'uploads/dsfdsfds-1_etN4diXd3Mcs4-EYXJoHpg-780x405.jpeg',
          'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
           Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
           id est laborum.',
           'order'=>$count,
           'statu'=>"1",
          'hit'=>0,
          'created_at'=>now(),
          'updated_at'=>now()
        ]);
      }
    }
}
