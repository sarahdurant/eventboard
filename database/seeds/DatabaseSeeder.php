<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Event;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        User::create(array(
            'name' => 'sarahdurant',
            'email' => 'sarah@example.com',
            'isOrganizer' => true,
            'password' => 'qwerty'
        ));
        $this->call('UsersTableSeeder');
        $this->call('EventsTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('EventsTagsTableSeeder');
        $this->call('SubscriptionsTableSeeder');
	}

}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++)
        {
            User::create(array(
                'name' => $faker->userName,
                'email' => $faker->email,
                'isOrganizer' => $faker->boolean($chanceOfGettingTrue = 50),
                'password' => $faker->word
            ));
        }
    }
}

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++)
        {
            $start = $faker->dateTimeBetween($startDate = 'now', $endDate = '+12 weeks');
            $end = $start->add(new DateInterval('PT' . rand(1,8) . 'H'));

            Event::create(array(
                'title' => $faker->text($maxNbChars = 40),
                'description' => $faker->text($maxNbChars = 512),
                'startDate' => $start,
                'endDate' => $end,
                'organizerID' => $faker->numberBetween($min = 1, $max = 100)
            ));
        }
    }
}

class TagsTableSeeder extends Seeder
{
    public function run()
    {

    }
}
class EventsTagsTableSeeder extends Seeder
{
    public function run()
    {

    }
}
class SubscriptionsTableSeeder extends Seeder
{
    public function run()
    {

    }
}