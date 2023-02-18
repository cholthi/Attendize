<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use App\Models\Order;
use App\Models\EventStat;
use App\Attendize\PaymentUtils;

class CheckMgurushPaymentStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


  public $tries = 3;
  public $backoff = 1;
  protected $endpoint  =  'https://app.mgurush.com/irh/ecomTxn/getTxnStatus';
  protected  $order;

 /**
  * Create a new job instance.
  *
  * @return void
  */

    public function __construct($order)
    {
        Log::info("Checking payment status for order with txnRefNumber: #" . $order->order_reference);
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     //check order is free and bail out
    if(PaymentUtils::isfree($this->order->amount)
      {
        return;
      }
     $payment_config = $this->order->account->getGateway($this->order->payment_gateway_id);
     $client = new \GuzzleHttp\Client();

     $data = [
      'txnRefNumber' => $this->order->transaction_id
     ];

     $headers = [
       'Content-Type' => 'application/json',
       'access_key'   => $payment_config->config['accessKey'],
       'Hmac'        => $this->getHash($data, $payment_config->config['secretKey'])
      ];

     $response  = $client->request('POST', $this->endpoint, ['body'=> json_encode($data), 'headers'=>$headers]);
     if($response->getStatusCode() === 200)
        {
         $decoded = json_decode($response->getBody()->getContents(), true);
        // dd($decoded);
         $payment_success = $decoded['status']['statusCode'] == 0 ? true : false;

        if(!$payment_success || !is_numeric($decoded['message']['txnId']))
           {
            Log::info("Mgurush payment having status: ".$decoded['message']['txnStatus']);
           throw  new \Exception("Mgurush payment status: ".$decoded['message']['txnStatus']);
           }
           //payment successded change the order status
          Order::where('id',$this->order->id)
          ->update([
                   'is_payment_received' => 1,
                   'order_status_id' => config('attendize.order.complete'),
                   'transaction_id'  => $decoded['message']['txnId']
               ]);

            //update Event stats
            $event = $this->order->event;
            $event_stats = EventStats::updateOrCreate([
                'event_id' => $event->id
            ]);

            $event_stats->increment('sales_volume', $this->order->amount);
            $event_stats->increment('organiser_fees_volume', $this->order->organiser_booking_fee);
            $event_stats->increment('tickets_sold', $ticket_order['total_ticket_quantity']);
        }
    }

  private function getHash($data, $secret)
   {

     $encoded = json_encode($data);
     $raw = hash_hmac('sha256',$encoded, $secret, true);

      $hash = base64_encode($raw);

      return $hash;

   }
}
