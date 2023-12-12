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
    <title>Elemental Store - Comprovante de compra</title>
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
            span {
                color: #a5a5a5;
                font-size: 30px;
            }
        </style>
        <h2>Elemental Store - Comprovante de compra Nº {{$order->id}}</h2>
        <span>Por segurança, tire print deste comprovante e mantenha o mesmo salvo.</span>

        <table>
            <thead>
            <tr>
                <th>Produto</th>
                <th>Valor</th>
                <th>ID do usuário</th>
                <th>Data da compra</th>
                <th>Status da compra</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td>R$: {{number_format($product->price,2,",",".")}}</td>
                <td>{{$order->player_id}}</td>
                <td>{{\Carbon\Carbon::make($order->date)->format('d/m/Y | H:m:s')}}</td>
                <td>Aprovada</td>
            </tr>

            </tbody>
        </table>

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
</body>
</html>
