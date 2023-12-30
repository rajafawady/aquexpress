<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Autoorder;
use App\Models\Order;

class CheckAutoOrders extends Command
{
    protected $signature = 'check:autoorders';
    protected $description = 'Check and process auto orders';

    public function handle()
    {
        // Get auto orders where DATE_ADD(updated_at, INTERVAL period DAY) equals the current date
        $autoOrders = Autoorder::whereRaw('DATE(DATE_ADD(updated_at, INTERVAL period DAY)) = CURDATE()')->get();

        foreach ($autoOrders as $autoOrder) {
            $orderTime = $autoOrder->time;
            // Create a datetime object using the current date and the given time
            $currentDate = new \DateTime(); // Replace with your app timezone
            $datetimeString = $currentDate->format('Y-m-d') . ' ' . $orderTime;
            $datetime = new \DateTime($datetimeString);
            // Process and create a new order entry
            $order = new Order([
                'user_id' => $autoOrder->user_id,
                'quantity' => $autoOrder->quantity,
                'address'=> $autoOrder->address,
                'phone'=> $autoOrder->phone,
                'time' => $datetime, 
                'amount' => $autoOrder->amount,
                'payment_method' => $autoOrder->payment_method,
                'status'=>'new',
            ]);

            $order->save();

            // Update the autoorder entry
            $autoOrder->update(['updated_at' => now()]);
        }
        $this->info('Auto orders checked and processed successfully.');
    }
}
