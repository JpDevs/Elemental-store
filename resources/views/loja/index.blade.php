{{--<!DOCTYPE html>--}}
<html lang="pt-br">
<head>
    <title>Elemental Store</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<header>
    <img src="{{asset('img/unknown.png')}}" alt="" class="img-fluid">
</header>
<section class="menu">
    <div class="row">
        <div class="categorias">
            <ul>
                <li>
                    <button class="btn__tab" id="all" data-category-id="0">Home</button>
                </li>
                <li>
                    <button class="btn__tab" id="all__vip" data-category-id="1">VIP</button>
                </li>
                <li>
                    <button class="btn__tab" id="all__money" data-category-id="2">Dinheiro</button>
                </li>
                <li>
                    <button class="btn__tab" id="all__cars" data-category-id="3">Carros</button>
                </li>
                <li>
                    <button class="btn__tab" id="all__extra" data-category-id="4">Extra</button>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="section">
    <style>
        h1 {
            color: #FFF;
        }
        b{
            color: #ff0000;
        }
        span {
            color: #FFF;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="content__card active" id="all">
                <center><h1>Elemental Store</h1></center>
                <br>
               <center><b>ATENÇÃO: </b> <span>Certifique-se de fazer log-out da cidade antes de concluir a compra para que o set possa ser feito corretamente. Caso dê qualquer erro no set, tire uma print do comprovante da compra e abra um ticket no discord.</span></center>
            </div>
            <div class="content__card" id="all__vip">
                <div class="display">
                    <div class="d-flex" id="dFlexVip">
                    </div>
                </div>
            </div>
            <div class="content__card" id="all__money">
                <div class="display">
                    <div class="d-flex" id="dFlexMoney">
                    </div>
                </div>
            </div>
            <div class="content__card" id="all__cars">
                <div class="d-flex" id="dflexCars">
                </div>
            </div>
            <div class="content__card" id="all__extra">
                <div class="display">
                    <div class="d-flex" id="dFlexExtra">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
