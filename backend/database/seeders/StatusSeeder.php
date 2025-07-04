<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['Inviata','Screening','Colloquio','Offerta','Rifiutata'];
        foreach( $statuses as $status ) {
            \App\Models\Statuses::updateOrCreate(['name'=>$status]);
        }
    }
}
