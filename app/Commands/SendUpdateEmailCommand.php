<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class SendUpdateEmailCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $pets = Pet::all();

        foreach ($pets as $pet) {
            $donors = $pet->$donors;
            $update = $pet->$updates;
            
            foreach ($donors as $donor) {
               $emailAddress = $donor->$email;
               sendEmail($emailAddress, $update, $pet);
            }
           
        }
    }

    public function sendEmail($emailAdd, $updateMsg, $petName){

        $sbj = "Updates on your Pet " . $petName . "!";
        // the message
        $msg = $updateMsg;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail("aminshaan2810@gmail.com",$sbj,$msg);
    }
}
