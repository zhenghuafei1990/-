<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 50; $i++) { 
      
	        DB::table('message')->insert([
	        	'vip'=>'0',
	            'mname' => str_random(10),
	            'sex'=>'1',
	            'addr'=>'北京市昌平区',
	            'phone'=>'15522456786',
	            'header'=>'/uploads/15388130026223.jpg',
	            'oname'=>'',
	            'address'=>'青岛市',
	            'sphone'=>'18545678654'
	        ]);  

    	}
    }
}
