<?php

namespace App\Jobs;

use App\Services\External\NotifyTransactionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Notify implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $amount;
    protected $hour;

    public function __construct($user, $amount, $hour)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->hour = $hour;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notifyService = new NotifyTransactionService();
        $notifyService->sendMessage(["mail" => $this->user->email, "message" => "Pagamento no valor de $this->amount recebido às $this->hour =)"]);
    }

    public function tags()
    {
        return ['mail: ' . $this->user];
    }
}
