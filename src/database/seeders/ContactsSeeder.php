<?php

namespace Prhl2375\ZentixPackageTest\database\seeders;

use Illuminate\Database\Seeder;
use Prhl2375\ZentixPackageTest\Models\Contact\Contact;
use Prhl2375\ZentixPackageTest\Models\Contact\ContactPhone;
use Faker\Factory as Faker;

class ContactsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $contact = Contact::create([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
            ]);

            $phonesCount = rand(1, 5);

            for ($j = 0; $j < $phonesCount; $j++) {
                ContactPhone::create([
                    'contact_id' => $contact->id,
                    'phone'      => $faker->e164PhoneNumber,
                ]);
            }
        }
    }
}
