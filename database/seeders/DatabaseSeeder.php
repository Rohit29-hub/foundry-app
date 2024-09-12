<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Job;
use App\Models\Station;
use App\Models\User;
use App\Models\Jobcomment;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'password'=>bcrypt('password'),
            'role' => 'manager1'
        ]);

        $ir = Client::create(['title'=>'Diodes','color_code'=>'F8285B']);
        $srbwipl = Client::create(['title'=>'Transistors','color_code'=>'16C653']);
        $concor = Client::create(['title'=>'MOSFETS','color_code'=>'FF6F1F']);
        $titagarh = Client::create(['title'=>'Rectifiers','color_code'=>'723AEA']);
        $jindal = Client::create(['title'=>'Regulators','color_code'=>'1A84FF']);



//        $ir = Client::create(['title'=>'Indian Railways','color_code'=>'F8285B']);
//        $srbwipl = Client::create(['title'=>'SRBWIPL','color_code'=>'16C653']);
//        $concor = Client::create(['title'=>'CONCOR','color_code'=>'FF6F1F']);
//        $titagarh = Client::create(['title'=>'Titagarh','color_code'=>'723AEA']);
//        $jindal = Client::create(['title'=>'Jindal','color_code'=>'1A84FF']);

        $station1 = Station::create(['title'=>'Deposition','time_duration'=> 1.8]);
        $station2 = Station::create(['title'=>'Lithography','time_duration'=> 1.2]);
        $station3 = Station::create(['title'=>'Etching','time_duration'=> 1.4]);
        $station4 = Station::create(['title'=>'Packaging','time_duration'=> 1.6]);

        

//        $station1 = Station::create(['title'=>'Frame Assembly']);
//        $station2 = Station::create(['title'=>'Body Assembly']);
//        $station3 = Station::create(['title'=>'Surface Treatment']);
//        $station4 = Station::create(['title'=>'Final Assembly']);
//
        // $ir_order1 = $ir->orders()->create();
        // $srbwipl_order1 = $srbwipl->orders()->create();
        // $concor_order1 = $concor->orders()->create();
        // $titagarh_order1 = $titagarh->orders()->create();
        // $jindal_order1 = $jindal->orders()->create();

        $ir_order1 = Order::create(['order_number' => 'IR001', 'item_name' => 'IR Item 1', 'quantity' => 10 , 'client_id'=> $ir->id]);
        $srbwipl_order1 = Order::create(['order_number' => 'SRB001', 'item_name' => 'SRB Item 1', 'quantity' => 15,'client_id'=> $srbwipl->id]);
        $concor_order1 = Order::create(['order_number' => 'CON001', 'item_name' => 'CON Item 1', 'quantity' => 20,'client_id'=> $concor->id]);
        $titagarh_order1 = Order::create(['order_number' => 'TIT001', 'item_name' => 'TIT Item 1', 'quantity' => 25,'client_id'=> $titagarh->id]);
        $jindal_order1 = Order::create(['order_number' => 'JIN001', 'item_name' => 'JIN Item 1', 'quantity' => 30,'client_id'=> $jindal->id]);



//        Job::create(['title'=>'SRB572','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>80,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'SRB575','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>60,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC881','order_id'=>$concor_order1->id,'station_id'=>$station1->id,'progress'=>42,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'TT122','order_id'=>$titagarh_order1->id,'station_id'=>$station1->id,'progress'=>73,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'SRB580','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>30,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'SRB584','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC884','order_id'=>$concor_order1->id,'station_id'=>$station1->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
//
//
//        Job::create(['title'=>'JIN222','order_id'=>$jindal_order1->id,'station_id'=>$station2->id,'progress'=>90,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC804','order_id'=>$concor_order1->id,'station_id'=>$station2->id,'progress'=>77,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC802','order_id'=>$concor_order1->id,'station_id'=>$station2->id,'progress'=>49,'due_date'=>now()->addMinutes(rand(15,35))]);
//
//
//        Job::create(['title'=>'IR1572','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>80,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'IR1585','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>60,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC821','order_id'=>$concor_order1->id,'station_id'=>$station3->id,'progress'=>42,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'TT102','order_id'=>$titagarh_order1->id,'station_id'=>$station3->id,'progress'=>73,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'IR1584','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'IR1284','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC621','order_id'=>$concor_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'IR1084','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
//
//
//        Job::create(['title'=>'IR1972','order_id'=>$ir_order1->id,'station_id'=>$station4->id,'progress'=>100,'due_date'=>now()->addMinutes(rand(15,35))]);
//        Job::create(['title'=>'COC175','order_id'=>$concor_order1->id,'station_id'=>$station4->id,'progress'=>60,'due_date'=>now()->addMinutes(rand(15,35))]);
//
//        Jobcomment::create(['content'=>'10 items done. Progress updated to 40%','job_id'=>1,'user_id'=>1, 'created_at'=>now()->addMinutes(5)]);
//        Jobcomment::create(['content'=>'5 items done. Progress: 60%','job_id'=>1,'user_id'=>1, 'created_at'=>now()->addMinutes(7)]);


        Job::create(['title'=>'TRANS572','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>80,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'TRANS575','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>60,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF881','order_id'=>$concor_order1->id,'station_id'=>$station1->id,'progress'=>42,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'RECT122','order_id'=>$titagarh_order1->id,'station_id'=>$station1->id,'progress'=>73,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'TRANS580','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>30,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'TRANS584','order_id'=>$srbwipl_order1->id,'station_id'=>$station1->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF884','order_id'=>$concor_order1->id,'station_id'=>$station1->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);


        Job::create(['title'=>'REGUL222','order_id'=>$jindal_order1->id,'station_id'=>$station2->id,'progress'=>90,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF804','order_id'=>$concor_order1->id,'station_id'=>$station2->id,'progress'=>77,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF802','order_id'=>$concor_order1->id,'station_id'=>$station2->id,'progress'=>49,'due_date'=>now()->addMinutes(rand(15,35))]);


        Job::create(['title'=>'DIOD1572','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>80,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'DIOD1585','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>60,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF821','order_id'=>$concor_order1->id,'station_id'=>$station3->id,'progress'=>42,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'RECT102','order_id'=>$titagarh_order1->id,'station_id'=>$station3->id,'progress'=>73,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'DIOD1584','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'DIOD1284','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF621','order_id'=>$concor_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'DIOD1084','order_id'=>$ir_order1->id,'station_id'=>$station3->id,'progress'=>0,'due_date'=>now()->addMinutes(rand(15,35))]);


        Job::create(['title'=>'DIOD1972','order_id'=>$ir_order1->id,'station_id'=>$station4->id,'progress'=>100,'due_date'=>now()->addMinutes(rand(15,35))]);
        Job::create(['title'=>'MOSF175','order_id'=>$concor_order1->id,'station_id'=>$station4->id,'progress'=>60,'due_date'=>now()->addMinutes(rand(15,35))]);

        Jobcomment::create(['content'=>'10 items done. Progress updated to 40%','job_id'=>1,'user_id'=>1, 'created_at'=>now()->addMinutes(5)]);
        Jobcomment::create(['content'=>'5 items done. Progress: 60%','job_id'=>1,'user_id'=>1, 'created_at'=>now()->addMinutes(7)]);


    }
}
