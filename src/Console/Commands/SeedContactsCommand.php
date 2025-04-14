<?php
declare(strict_types=1);

namespace Prhl2375\ZentixPackageTest\Console\Commands;


use Illuminate\Console\Command;

class SeedContactsCommand extends Command
{
   protected $signature = 'zentixpackagetest:seed';

   protected $description = 'Seed contacts';

   public function handle(): void{
       $this->call('db:seed', ['--class' => 'Prhl2375\ZentixPackageTest\database\seeders\ContactsSeeder']);
       $this->info('Seed contacts successfully');
   }
}
