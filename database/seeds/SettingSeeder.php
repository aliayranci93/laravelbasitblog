<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('settings')->insert([
        'logo'=>'',
        'favicon'=>'',
        'baslik'=>'Site Başlık',
        'aktif'=>'1',
        'aciklama'=>'Site Açıklama',
        'anahtarKelimeler'=>'',
        'ekKodlar'=>'',
        'footerYazisi'=>'',
        'facebook'=>'',
        'instagram'=>'',
        'whatsapp'=>'',
        'youtube'=>'',
        'googleplus'=>'',
        'created_at'=>now(),
        'updated_at'=>now()
      ]);
    }
}
