<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Realizácia platby s Vami zvolenou hodnotou') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <html>
                <head>


                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <style type="text/css">
                        .column {
                            float: left;
                            width: 33.33%;
                        }

                        /* Clear floats after the columns */
                        .row:after {
                            content: "";
                            display: table;
                            clear: both;
                        }
                        .vertical-center {
                            margin: 0;
                            position: absolute;
                            left: 50%;
                            -ms-transform: translateX(-50%);
                            transform: translateX(-50%);
                        }
                        .container {
                            margin-top: 40px;
                        }
                        .panel-heading {
                            display: inline;
                            font-weight: bold;
                        }

                    </style>


                </head>
                <body>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row text-center">
                                        <h3 class="panel-heading">Platobné údaje</h3>
                                    </div>
                                </div>
                                <div class="panel-body ml-1">

                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
{{--                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>--}}
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                    @endif

                                    <form role="form" action="{{ route('stripe.payment') }}" method="post" class="validation"
                                          data-cc-on-file="false"
{{--                                          data-stripe-publishable-key="{{env('STRIPE_KEY')}}"--}}
                                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                          <?php echo env('STRIPE_KEY');
                                          ?>

                                          id="payment-form">
                                        @csrf

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <x-jet-label class='control-label' value="{{ __('Meno vlastníka karty') }}"  />
                                                <x-jet-input
                                                    class='form-control block mt-1 w-full' size='4' type='text'/>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <x-jet-label class='control-label'  value="{{ __('Suma') }}"  />
                                                <x-jet-input
                                                    class='form-control block mt-1 w-full' type='number'  step="0.01" id="price"/>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group card required'>
                                                <x-jet-label class='control-label' value="{{ __('Číslo karty') }}" />
                                                <x-jet-input
                                                    autocomplete='off' class='form-control card-num block mt-1 w-full' size='20'
                                                    type='text'/>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class="column  form-group cvc required">
                                                <x-jet-label class='control-label' value="{{ __('CVC') }}" />
                                                <x-jet-input autocomplete='off' class='form-control card-cvc block mt-1 w-full' placeholder='e.g 415' size='12'
                                                       type='text'/>
                                            </div>
                                            <div class="column form-group expiration required">
                                                <x-jet-label class='control-label' value="{{ __('Mesiac expirácie karty') }}" />
                                                <x-jet-input
                                                    class='form-control card-expiry-month block mt-1 w-full ' placeholder='MM' size='2'
                                                    type='text'/>
                                            </div>
                                            <div class="column form-group expiration required">
                                                <x-jet-label class='control-label' value="{{ __('Rok expirácie karty') }}" />
                                                <x-jet-input
                                                    class='form-control card-expiry-year block mt-1 w-full ' placeholder='YYYY' size='4'
                                                    type='text'/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class='form-row row'>
                                            <div class='col-md-12 hide error form-group'>
                                                <div class='alert-danger alert'><small>Opravte si chyby pred dokončením platby.</small></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 ">
                                                <x-jet-button class=" vertical-center " type="submit">Prispieť</x-jet-button>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </body>

                <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

                <script type="text/javascript">
                    $(function() {
                        var $form         = $(".validation");
                        $('form.validation').bind('submit', function(e) {
                            var $form         = $(".validation"),
                                inputVal = ['input[type=email]', 'input[type=password]','input[type=number]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                                $inputs       = $form.find('.required').find(inputVal),
                                $errorStatus = $form.find('div.error'),
                                valid         = true;
                            $errorStatus.addClass('hide');

                            $('.has-error').removeClass('has-error');
                            $inputs.each(function(i, el) {
                                var $input = $(el);
                                if ($input.val() === '') {
                                    $input.parent().addClass('has-error');
                                    $errorStatus.removeClass('hide');
                                    e.preventDefault();
                                }
                            });

                            if (!$form.data('cc-on-file')) {
                                e.preventDefault();
                                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                                Stripe.createToken({
                                    number: $('.card-num').val(),
                                    cvc: $('.card-cvc').val(),
                                    exp_month: $('.card-expiry-month').val(),
                                    exp_year: $('.card-expiry-year').val()
                                }, stripeHandleResponse);
                            }

                        });

                        function stripeHandleResponse(status, response) {
                            if (response.error) {
                                $('.error')
                                    .removeClass('hide')
                                    .find('.alert')
                                    .text(response.error.message);
                            } else {
                                var token = response['id'];

                                var price = $('#price').val()*100;
                                price = Math.round(price);

                                $form.find('input[type=text]').empty();
                                $form.append("<input type='hidden' name='price' value='" + price + "'/>");
                                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                                $form.get(0).submit();
                            }
                        }
                    });
                </script>

                </html>
            </div>
            <small>Použite testovaciu kartu : Číslo - 4242424242424242 Brand - Visa	CVC - Ľubovolné 3 číslice	Dátum - Ľubovoľný dátum</small>
        </div>
    </div>
</x-app-layout>
