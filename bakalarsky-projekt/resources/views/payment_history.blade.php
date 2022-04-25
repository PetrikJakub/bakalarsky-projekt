<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('História platieb') }}
        </h2>

    </x-slot>
    <style type="text/css">
        .vertical-center {
            margin: 0;
            position: absolute;
            left: 50%;
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        .panel-heading {
            display: inline;
            font-weight: bold;
        }
    </style>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">


            <table class="table">
                <thead style="width: 100%">
                <tr>
                    <th style="width: 12%">Stripe ID</th>
                    <th style="width: 12%">Produkt</th>
                    <th style="width: 12%">Status</th>
                    <th style="width: 12%">Cena</th>
                    <th style="width: 12%">Dátum</th>
                </tr>
                </thead>
                <tbody >
                <?php
                $payments = DB::table('subscriptions')->get();
                $payments2 = DB::table('subscription_items')->get();
                $id = \Auth::user()->id;

                foreach($payments as $key => $data){
                    $id2=$data->user_id;
                    if ($id == $id2){
                        foreach ($payments2 as $key =>$data2){
                            if ($data->id == $data2->subscription_id){
                                $product = $data2->stripe_product;

                                if ($product == 'prod_Kjc7PGB2PZ9XbA') $prod = 'Zlaty donate';
                                else if ($product == 'prod_KjGJ6k09ekn10Z') $prod = 'Strieborny donate';
                                else $prod = 'non defined';

                                $price = $data2->stripe_price;
                                if ($price == 'price_1K3nn3Ju4Eh4pdQ4PQbD7MKZ') $pric = '5€';
                                else if ($price == 'price_1K48tdJu4Eh4pdQ4UVD5oBJF') $pric = '10€';
                                else $pric = 'non defined';

                                echo("
                                    <tr>
                                        <th>{$data->stripe_id}</th>
                                        <th>{$prod}</th>
                                        <th>{$data->stripe_status}</th>
                                        <th>{$pric}</th>
                                        <th>{$data->created_at}</th>
                                    </tr>
                                    ");
                            }
                        }
                    }
                }
                ?>
                </tbody>
            </table>


        </div>
    </div>
    @push('scripts')

        <script src="https://js.stripe.com/v3/"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var stripe = Stripe('pk_test_51Jz6J9Ju4Eh4pdQ4zAMOTyY8KhUKWkyQacrrHMji8bPIuSLsJvtLz79MOcgCOFBR57CCNerqy9n2q4DkpjGCinye00j6CajLAo');

            var elements = stripe.elements();

            var style = {
                base: {
                    color:'#32325d'
                },
                invalid:{
                    color: '#fa755'
                }
            };

            var card = elements.create('card',{
                style: style
            });

            card.mount('#card-element');
            card.on('change', function (event){
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;

                }else {displayError.textContent = '';
                }
            });
            var form = document.getElementById('payment-form');
            var clientSecret = form.dataset.secret;
            const cardHolderName = document.getElementById('card-holder-name');

            form.addEventListener('submit', async function (event){
                event.preventDefault();

                const {
                    setupIntent,
                    error
                }= await stripe.confirmCardSetup(
                    clientSecret,{
                        payment_method: {
                            card: card,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                );
                if (error){
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent=error.message;
                }else{
                    stripeTokenHandler(setupIntent.payment_method);

                }

            });

            function  stripeTokenHandler(token){
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type','hiden');
                hiddenInput.setAttribute('name','paymentMethodId');
                hiddenInput.setAttribute('value',token);
                form.appendChild(hiddenInput);
                //
                // form.submit();

                var url =  form.getAttribute('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $('form').serialize(),
                    success: function(data)
                    {
                        location.reload();
                        alert('Payment has been successfully processed.');
                    }
                });
            }


        </script>
    @endpush

</x-app-layout>
