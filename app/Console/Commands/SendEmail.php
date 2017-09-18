<?php

namespace App\Console\Commands;
use App\User;
use App\Mail\DomainExpired;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

use App\Domain;
use Carbon\Carbon;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:check_expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim email reminder pada user saat ada domain yang akan expire.';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $em;

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
       // $user = User::findOrFail($this->argument('user'));
        $this->info('Checking expire domain...');
        $next_week_expire_domains = Domain::where('end', Carbon::now()->addWeek()->format('Y-m-d'))->get();
        foreach ($next_week_expire_domains as $domain) {
            $this->info(json_encode($domain));
            Mail::to(env('ADMIN_EMAIL','davidsugi011@gmail.com'))->send(new DomainExpired($domain));
        }
        
    }
}
