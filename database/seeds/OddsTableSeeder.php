<?php

use Illuminate\Database\Seeder;

class OddsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('odds')->truncate();

//                    'american' => $american
        DB::table('odds')->insert([
            [ 'fraction' => "1/5", 'decimal' => 1.2, 'american' => -500],
            [ 'fraction' => "2/9", 'decimal' => 1.22, 'american' => -450],
            [ 'fraction' => "1/4", 'decimal' => 1.25, 'american' => -400],
            [ 'fraction' => "2/7", 'decimal' => 1.28, 'american' => -350],
            [ 'fraction' => "3/10", 'decimal' => 1.3, 'american' => -333.3],
            [ 'fraction' => "1/3", 'decimal' => 1.33, 'american' => -300],
            [ 'fraction' => "7/20", 'decimal' => 1.35, 'american' => -285.7],
            [ 'fraction' => "4/11", 'decimal' => 1.36, 'american' => -275],
            [ 'fraction' => "2/5", 'decimal' => 1.4, 'american' => -250],
            [ 'fraction' => "4/9", 'decimal' => 1.44, 'american' => -225],
            [ 'fraction' => "9/20", 'decimal' => 1.45, 'american' => -222.2],
            [ 'fraction' => "40/85", 'decimal' => 1.47, 'american' => -212.5],
            [ 'fraction' => "1/2", 'decimal' => 1.5, 'american' => -200],
            [ 'fraction' => "8/15", 'decimal' => 1.53, 'american' => -187.5],
            [ 'fraction' => "4/7", 'decimal' => 1.57, 'american' => -175],
            [ 'fraction' => "3/5", 'decimal' => 1.6, 'american' => -166.7],
            [ 'fraction' => "8/13", 'decimal' => 1.62, 'american' => -162.5],
            [ 'fraction' => "5/8", 'decimal' => 1.63, 'american' => -160],
            [ 'fraction' => "4/6", 'decimal' => 1.66, 'american' => -150],
            [ 'fraction' => "7/10", 'decimal' => 1.7, 'american' => -142.9],
            [ 'fraction' => "8/11", 'decimal' => 1.72, 'american' => -137.5],
            [ 'fraction' => "4/5", 'decimal' => 1.8, 'american' => -125],
            [ 'fraction' => "5/6", 'decimal' => 1.83, 'american' => -120],
            [ 'fraction' => "9/10", 'decimal' => 1.9, 'american' => -111.1],
            [ 'fraction' => "10/11", 'decimal' => 1.91, 'american' => -110],
            [ 'fraction' => "20/21", 'decimal' => 1.95, 'american' => -105],
            [ 'fraction' => "1/1", 'decimal' => 2, 'american' => -100],
            [ 'fraction' => "21/20", 'decimal' => 2.05, 'american' => 105],
            [ 'fraction' => "11/10", 'decimal' => 2.1, 'american' => 110],
            [ 'fraction' => "6/5", 'decimal' => 2.2, 'american' => 120],
            [ 'fraction' => "5/4", 'decimal' => 2.25, 'american' => 125],
            [ 'fraction' => "13/10", 'decimal' => 2.3, 'american' => 130],
            [ 'fraction' => "11/8", 'decimal' => 2.38, 'american' => 137.5],
            [ 'fraction' => "7/5", 'decimal' => 2.4, 'american' => 140],
            [ 'fraction' => "6/4", 'decimal' => 2.5, 'american' => 150],
            [ 'fraction' => "8/5", 'decimal' => 2.6, 'american' => 160],
            [ 'fraction' => "13/8", 'decimal' => 2.63, 'american' => 162.5],
            [ 'fraction' => "17/10", 'decimal' => 2.7, 'american' => 170],
            [ 'fraction' => "7/4", 'decimal' => 2.75, 'american' => 175],
            [ 'fraction' => "9/5", 'decimal' => 2.8, 'american' => 180],
            [ 'fraction' => "15/8", 'decimal' => 2.88, 'american' => 187.5],
            [ 'fraction' => "19/10", 'decimal' => 2.9, 'american' => 190],
            [ 'fraction' => "2/1", 'decimal' => 3, 'american' => 200],
            [ 'fraction' => "21/10", 'decimal' => 3.1, 'american' => 210],
            [ 'fraction' => "85/40", 'decimal' => 3.13, 'american' => 212.5],
            [ 'fraction' => "11/5", 'decimal' => 3.2, 'american' => 220],
            [ 'fraction' => "9/4", 'decimal' => 3.25, 'american' => 225],
            [ 'fraction' => "23/10", 'decimal' => 3.3, 'american' => 230],
            [ 'fraction' => "95/40", 'decimal' => 3.38, 'american' => 237.5],
            [ 'fraction' => "12/5", 'decimal' => 3.4, 'american' => 240],
            [ 'fraction' => "5/2", 'decimal' => 3.5, 'american' => 250],
            [ 'fraction' => "13/5", 'decimal' => 3.6, 'american' => 260],
            [ 'fraction' => "11/4", 'decimal' => 3.75, 'american' => 275],
            [ 'fraction' => "14/5", 'decimal' => 3.8, 'american' => 280],
            [ 'fraction' => "3/1", 'decimal' => 4, 'american' => 300],
            [ 'fraction' => "16/5", 'decimal' => 4.2, 'american' => 320],
            [ 'fraction' => "10/3", 'decimal' => 4.33, 'american' => 333.3],
            [ 'fraction' => "7/2", 'decimal' => 4.5, 'american' => 350],
            [ 'fraction' => "18/5", 'decimal' => 4.6, 'american' => 360],
            [ 'fraction' => "4/1", 'decimal' => 5, 'american' => 400],
            [ 'fraction' => "9/2", 'decimal' => 5.5, 'american' => 450],
            [ 'fraction' => "5/1", 'decimal' => 6, 'american' => 500],
            [ 'fraction' => "11/2", 'decimal' => 6.5, 'american' => 550],
            [ 'fraction' => "6/1", 'decimal' => 7, 'american' => 600],
            [ 'fraction' => "13/2", 'decimal' => 7.5, 'american' => 650],
            [ 'fraction' => "7/1", 'decimal' => 8, 'american' => 700],
            [ 'fraction' => "15/2", 'decimal' => 8.5, 'american' => 750],
            [ 'fraction' => "8/1", 'decimal' => 9, 'american' => 800],
            [ 'fraction' => "17/2", 'decimal' => 9.5, 'american' => 850],
            [ 'fraction' => "9/1", 'decimal' => 10, 'american' => 900],
            [ 'fraction' => "10/1", 'decimal' => 11, 'american' => 1000],
            [ 'fraction' => "50/1", 'decimal' => 51, 'american' => 5000],
        ]);
    }

}
