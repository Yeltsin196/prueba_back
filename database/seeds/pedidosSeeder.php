<?php

use Illuminate\Database\Seeder;

class pedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Pedidos::class, 10)->create();
    }
}
