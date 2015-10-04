<?php

namespace App\Console\Commands;

use App\Donor;
use App\Pet;
use App\Update;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class SendEmailUpdatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pups:send-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send out email updates to the subscribed pet donors';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Pet::all()->each(function(Pet $pet){
            $one_month_ago = Carbon::now()->subMonth();

            $updates = $pet->updates()->where('created_at', '>', $one_month_ago)->get();
            if($updates->count() == 0){
                return;
            }

            $subscribers = $pet->donors()->where('subscribed', '=', 1)->get();

            $subscribers->each(function(Donor $donor)use($updates, $pet){
                $emailAddress = $donor->email;
                $this->sendEmail($emailAddress, $updates, $pet);
            });
        });
    }


    private function sendEmail($emailAdd, Collection $updates, Pet $pet){

        $sbj = "Updates on your Pet " . $pet->name . "!";
        // the message
        $msg = $this->makeUpdateMessage($updates);

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        mail($emailAdd, $sbj, $msg);

        //Todo -- implement with laravel mail facade

        //Mail::send('emails.welcome', ['key' => 'value'], function($message)
        //{
        //    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
        //});
    }

    private function makeUpdateMessage(Collection $updates) {

        $message = '';

        $updates->each(function(Update $update)use(&$message){
            $message .= $this->pTagWrap($update->content);
        });

        return $message;
    }

    private function pTagWrap($content) {
        return "<p>{$content}</p>";
    }
}
