<?php

namespace App\Console\Commands;

use App\Mail\SneakyMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class SendSneakyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $managers = [
            [
                'email' => 'd-snyatkov@mail.ru',
                'name' => 'Manager',
            ],

        ];
        $devs =[
            [
            'email' => 'snydi611@gmail.com',
            'name' => 'Developer',
            ]
        ];
        Mail::to($managers)->bcc($devs)->send(new SneakyMail());

    }
}
