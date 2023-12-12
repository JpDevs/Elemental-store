{{--{{dd($product)}}--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Elemental Store - Pagamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="logo h3 mb-5">
        <img src="{{asset('/img/unknown.png')}}" alt="">
    </div>
    <style>
        .logo {
            margin-left: -6rem;
            margin-bottom: -4px;
            /*align-content: center;*/
            display: flex;
            justify-content: flex-start;

        }
        .logo img {
            width: 350px;
            height: 200px;
        }
    </style>
    <h1 class="h3 mb-5">Pagamento</h1>
    <div class="row">
        <!-- Left -->
        <div class="col-lg-9">
            <div class="accordion" id="accordionPayment">
                <!-- Credit card -->
                <div class="accordion-item mb-3">
                    <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                        <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#stripe"
                             aria-expanded="false">
                            <input class="form-check-input" checked type="radio" name="payment" id="payment1">
                            <label class="form-check-label pt-1" for="payment1">
                                Cartão de crédito (stripe)
                            </label>
                        </div>
                        <span>
                <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                  <g fill-rule="nonzero" fill="#333840">
                    <path
                        d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                    <path
                        d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                  </g>
                </svg>
              </span>
                    </h2>
                    <div id="stripe" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment"
                         style="">
                        <form role="form" action="{{route('stripe.post')}}" method="post" class="require-validation" data-cc-on-file="false" data-strip-publishable-key="{{env('STRIPE_KEY')}}" id="payment-form">
                            @csrf
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label class="form-label">Número do cartão (Apenas Números)</label>
                                <input id="cardNumber" type="text" class="form-control card-number" placeholder="">
                            </div>
                            <input type="hidden" name="productId" value="{{$product->id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nome do titular</label>
                                        <input id="cardHolder" name="cardHolder" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Data de vencimento</label>
                                        <input id="cardExpiration" type="text" class="form-control" placeholder="MM/AA">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Código de segurança</label>
                                        <input id="cardCvc" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">CPF do titular</label>
                                            <input id="holderDocument" name="holderDocument" type="tel" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PayPal -->
            </div>
        </div>
        <!-- Right -->
        <div class="col-lg-3">
            <div class="card position-sticky top-0">
                <div class="p-3 bg-light bg-opacity-10">
                    <h6 class="card-title mb-3">Sumário</h6>
                    <div class="d-flex justify-content-between mb-1 small">
                        <span>{{$product->name}}</span> <span>R$ {{number_format($product->price,2,",",".")}}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4 small">
                        <span>TOTAL</span> <strong class="text-dark">R$ {{number_format($product->price,2,",",".")}}</strong>
                    </div>
                    <div class="form-check mb-1 small">
                        <input class="form-check-input" type="checkbox" value="" id="tnc">
                        <label class="form-check-label" for="tnc">
                            Eu aceito os <a href="#">termos e condições</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Comprar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    body {
        background: #eee;
    }

    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 1rem;
    }

    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.5rem 1.5rem;
    }
</style>

<script type="text/javascript">

</script>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                let vencimento = $("#cardExpiration").val();
                let expiration = vencimento.split('/');
                Stripe.setPublishableKey('{{env('STRIPE_KEY')}}');
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: expiration[0],
                    exp_year: expiration[1]
                }, stripeResponseHandler);
            }
        });
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
</html>
