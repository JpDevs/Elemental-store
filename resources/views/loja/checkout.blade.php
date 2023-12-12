<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>Elemental Store - Checkout</title>
</head>
<body>
<section class="checkout">
    <div class="container">
        <img class="logocheckout" src="http://jpdevs-auth/img/unknown.png" alt="" class="img-fluid">
        <style>
            .logocheckout {
                width: 350px;
                height: 200px;
            }
        </style>
        <h2>Elemental Store - Checkout</h2>

        <table>
            <thead>
            <tr>
                <th>Produto</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$produto->name}}</td>
                <td>R$: {{number_format($produto->price,2,",",".")}}</td>
                <td>
                    <button id="delete">
                        <img src="img/icons8-delete-30.png" alt="">
                    </button>
                </td>
            </tr>

            </tbody>
        </table>

        <form action="javascript:;">
            <div class="input__group">
                <label for="">Nome Completo</label>
                <input id="fullName" class="form-control" type="text">
            </div>
            <div class="input__group">
                <label for="">E-mail</label>
                <input id="email" class="form-control" type="text">
            </div>

            <div class="input__group">
                <label for="">ID no servidor</label>
                <input id="playerId" class="form-control" type="text">
            </div>

            <div class="payment">
                <ul>
                    <li>
                        <button id="pre-proccess" class="btn btn-large btn-success">Prosseguir para pagamento</button>
                        <button style="display: none;" id="loading" class="btn btn-sm button_loading btn-success"><img src="{{asset('/img/loading.gif')}}"></button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</section>
<style>
    .button_loading {
        width: 100%;
        margin: 0 auto;

        /* apply other styles to "loading" buttons */
    }
    .button_loading img {
        width: 30%;
        margin: 0 auto;

        /* apply other styles to "loading" buttons */
    }
</style>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{env('STRIPE_KEY')}}');
    $('#pre-proccess').on('click', function () {
        $(this).hide();
        $('#loading').show();
        $.post('{{route('order.preprocess',$produto->id)}}', {
            playerId: $('#playerId').val(),
            fullName: $('#fullName').val(),
            email: $('#email').val(),
        }, function (data) {
            if (data.success) {
                fetch('{{route('stripe.session')}}', {
                    'method': 'POST',
                    'headers': {
                        'Content-Type': 'application/json'
                    },
                    'body': JSON.stringify({
                        'playerId': $('#playerId').val(),
                        'fullName': $('#fullName').val(),
                        'productId': {{$produto->id}},
                        'email': $('#email').val(),
                        'amount': {{$produto->price}}
                    })
                }).then(res => res.json()).then(payload => {
                    console.log(payload);
                    stripe.redirectToCheckout({sessionId: payload.id})
                })
            } else {
                alert(data.message);
                $('#pre-proccess').show();
                $('#loading').hide();
            }
        });
    });
</script>

</body>
</html>
