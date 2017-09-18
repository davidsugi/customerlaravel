<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Carbon\Carbon;
use App\Domain;


class DomainExpired extends Mailable
{
    use Queueable, SerializesModels;

    protected $domain;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $level = 'info';
        $introLines = [
            'Domain '. $this->domain->name . ' akan berakhir pada ' . $this->domain->endLabel .".",
            "Segera lakukan perpanjangan domain di ". $this->domain->registrar->registrar . ".",
            "Setelah melakukan perpanjangan domain, daftarkan perpanjangan domain dengan menekan tombol dibawah ini"
        ];
        $actionUrl = route('renewal_history.creates',$this->domain->id);
        $actionText = 'Perpanjang domain';
        $outroLines = [];

        return $this->subject("Domain ".$this->domain->name. ' akan berakhir pada '. $this->domain->endLabel)
                ->markdown('vendor.notifications.email')
                ->with(['level' =>$level,
                        'introLines' => $introLines,
                        'actionUrl' => $actionUrl,
                        'actionText' => $actionText,
                        'outroLines' => $outroLines
                    ]);
    }
}
