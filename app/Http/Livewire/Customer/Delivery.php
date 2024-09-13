<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Delivery as DeliveryModel;
use App\Models\Store;
use App\Models\UserCard;
use \Stripe\Stripe;
use \Stripe\StripeClient;
use App\Enums\DeliveryStatus;
use \Stripe\Customer;
use App\Models\Payment;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delivery extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $totalSteps = 7;
    public $currentActiveStep = 1;

    //user
    public $user;

    // select store
    public $store_id, $stores, $cart_error, $e_reciept;
      // receipt fields
    public $store_name, $store_address, $pickup_date, $pickup_time;
    // schedule delivery
    public $delivery_date, $delivery_time, $delivery_address, $phone_number, $customer_name, $pickup_need, $additinal_note;

    // card details
    public $card_name, $card_number, $exp_month, $exp_year, $cvv;

     public function mount()
    {
        $this->currentActiveStep = 1;
        $this->stores = Store::get();
        $this->user = auth()->user();
    }
    
       public function resetFields()
    {
        $this->store_id = '';
        $this->cart_error = '';
        $this->store_name = '';
        $this->store_address = '';
        $this->pickup_date = '';
        $this->pickup_time = '';
        $this->delivery_date = '';
        $this->delivery_time = '';
        $this->delivery_address = '';
        $this->phone_number = '';
        $this->customer_name = '';
        $this->pickup_need = '';
        $this->additinal_note = '';
        $this->card_name = '';
        $this->card_number = '';
        $this->exp_month = '';
        $this->exp_year = '';
        $this->cvv = '';
    }

      // Next step...
    public function increaseStep()
    {
        $this->validateData();
        $this->currentActiveStep += 1;

        if ($this->currentActiveStep > $this->totalSteps) {
            $this->currentActiveStep = $this->totalSteps;
        }
    }

    // Back step...
    public function decreaseStep()
    {
        $this->currentActiveStep -= 1;
    }

      // Validation form...
    public function validateData()
    {
        if ($this->currentActiveStep == 1) {
            $this->validate(
                [
                    'store_id' => 'required',
                ],
                [
                    'store_id.required' => 'The :attribute cannot be empty.',
                ]
            );
        } elseif ($this->currentActiveStep == 4) {
            $this->validate(
                [
                    'store_name' => 'required',
                    'store_address' => 'required',
                    'pickup_date' => 'required',
                    'pickup_time' => 'required'
                ]
            );
        } elseif ($this->currentActiveStep == 5) {
            $this->validate([
                'delivery_date' => 'required',
                'delivery_time' => 'required',
                'delivery_address' => 'required',
                'phone_number' => 'required',
                'customer_name' => 'required',
                'pickup_need' => 'required',
                'additinal_note' => 'required',
                'delivery_date' => 'required',
            ]);
        } elseif ($this->currentActiveStep == 6) {
            $this->validate([
                'store_name' => 'required',
                'store_address' => 'required',
                'pickup_date' => 'required',
                'pickup_time' => 'required',
                'delivery_date' => 'required',
                'delivery_time' => 'required',
                'delivery_address' => 'required',
                'phone_number' => 'required',
                'customer_name' => 'required',
                'pickup_need' => 'required',
                'additinal_note' => 'required',
                'delivery_date' => 'required',
            ]);
        } elseif ($this->currentActiveStep == 7) {
            $this->validate([
                'card_name' => 'required',
                'card_number' => 'required|numeric|digits:16',
                'exp_month' => 'required',
                'exp_year' => 'required',
                'cvv' => 'required|numeric|digits_between:3,4',
            ]);
        }
    }

      // stripe key..
    public function stripeKey()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

       public function store()
    {
        $this->validateData();

        $this->storeDelivery();
    }

     public function storeDelivery()
    {

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $stripe = new StripeClient(config('services.stripe.secret'));

            //.. create token...
            $token = $stripe->tokens->create([
                'card' => [
                    'name' => $this->card_name,
                    'number' => $this->card_number,
                    'exp_month' => $this->exp_month,
                    'exp_year' => $this->exp_year,
                    'cvc' => $this->cvv,
                ],
            ]);


            // create customer..
            $customer = Customer::create([
                'source' => $token['id'],
                'email' => $this->user->email,
                'description' => 'My name is ',
            ]);

            // customer id..
            $customer_id = $customer['id'];

            $amount = '100';

            //charge payment
            $charge = $stripe->charges->create([
                "amount" =>  $amount * 100,
                "currency" => "usd",
                "customer" => $customer_id,
                "description" => "Delivery",
                "capture" => true,
            ]);

            //save user card data..
            $card = new UserCard();
            $card->users_id = $this->user->id;
            $card->customer_id = $customer_id;
            $card->card_id = $token->card->id;
            $card->card_name = $this->card_name;
            $card->card_number = $token->card->last4;
            $card->exp_month = $token->card->exp_month;
            $card->exp_year = $token->card->exp_year;
            // dd($card);
            $card->save();

            $delivery = new DeliveryModel();
            $delivery->users_id = auth()->user()->id;
            $delivery->stores_id = $this->store_id;
            $delivery->store_name = $this->store_name;
            $delivery->store_address = $this->store_address;
            $delivery->pickup_date = $this->pickup_date;
            $delivery->pickup_time = $this->pickup_time;
            $delivery->delivery_date = $this->delivery_date;
            $delivery->delivery_time = $this->delivery_time;
            $delivery->delivery_address = $this->delivery_address;
            $delivery->phone_number = $this->phone_number;
            $delivery->customer_name = $this->customer_name;
            $delivery->pickup_need = $this->pickup_need;
            $delivery->additinal_note = $this->additinal_note;
            $delivery->status = DeliveryStatus::Pending;
            $delivery->save();

            $payment = new Payment();
            $payment->users_id = $this->user->id;
            $payment->delivery_id = $delivery->id;
            $payment->user_cards_id = $card->id;
            $payment->transaction_id = $charge->id;
            $payment->balance_transaction = $charge->balance_transaction;
            $payment->customer = $charge->customer;
            $payment->currency = $charge->currency;
            $payment->amount = $amount;
            $payment->payment_status = $charge->status;
            $payment->save();

            $this->resetFields();
            $this->alert('success', 'Delivery added successfully');

        } catch (\Stripe\Exception\RateLimitException $e) {
            $error = $e->getMessage();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $error = $e->getMessage();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            $error = $e->getMessage();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            $error = $e->getMessage();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $error = $e->getMessage();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        if (@$error) {
            $this->cart_error = $error;
        }


    }

    public function render()
    {
        return view('livewire.customer.delivery');
    }
}
