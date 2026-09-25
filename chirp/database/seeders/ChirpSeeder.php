<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::count() < 3 ? collect([
            User::create([
                'name' => "Max Emilian Verstappen",
                'email' => "redbull@gmail.com",
                'password' => bcrypt('DUDUDUDUDU')
            ]),
            User::create([
                'name' => 'John Kervin M. Ganzon',
                'email' => 'ganzon@gmail.com',
                'password' => bcrypt('squakker')
            ]),
            User::create([
                'name' => 'Justine',
                'email' => 'justine@gmail.com',
                'password' => bcrypt('Snowman - sia')
            ]),
        ]) : User::take(3)->get();

        $chirps = [
            'Oracle Red Bull Racing Formula 1 cars (such as the current-generation V6 turbo hybrid models) feature standard core powertrain and chassis specifications',
            'The Red Bull Racing RB16 and RB16B are Formula One racing cars designed and constructed by Red Bull Racing to compete during the 2020 and 2021 Formula One World Championships, respectively',
            'The RA621H was Hondas biggest change since 2017, as it used the same basic concept between 2017 and 2020',
            'Verstappen and Albon started second and fourth on the grid respectively for the season-opening Austrian Grand Prix, however both cars would go on to retire with electrical failures during the race',
            'At the season-opening Bahrain Grand Prix, Verstappen finished second and Pérez fifth.[23] During qualifying Verstappen achieved 1st and Pérez 11th',
            'To be, or not to be, that is the question',
            'I have a dream that my four little children will one day live in a nation where they will not be judged by the color of their skin but by the content of their character.'
        ];

        foreach ($chirps as $message) {
            $user->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
