@extends("layouts.app")
@php
    require __DIR__. '/../../../vendor/autoload.php';
    $hash = env("MARVEL_HASH");
    $key = env("MARVEL_PUBLIC_KEY");
    $url = "https://gateway.marvel.com:443/v1/public/characters/$id?ts=1&apikey=$key&hash=$hash";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url) ;
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept:application/json , content-type:application/json'));
    $result = curl_exec($curl);
    $result = json_decode($result, true);
    curl_close($curl);

    $character =  $result['data']['results'][0];
    $name=$character['name'];
    $price = rand(50, 100);
    $image = $character['thumbnail']['path'].'.'.$character['thumbnail']['extension'];

    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = "$name Poster";
    $item->quantity = 1;
    $item->unit_price = $price;
    $preference->items = array($item);
    $preference->save();
@endphp
@section('content')
    <div class="container ">
        <h1 class="text-center">Buy it!</h1>
        <div class="row text-center">
            <div class="col-6 ">
                <img height="450" src="{{$image}}" alt="">
            </div>
            <div class="col-6 bg-light pt-5">
                <h2>Poster</h2>
                <h3 class="pt-3">{{$name}}</h3>
                <p class="pt-3" style="font-size: 25px">Total: ${{$price}}</p>
                <div id="cho-container">
                </div>
            </div>
        </div>


    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
            locale: 'es-AR'
        });
        // Inicializa el checkout
        const container = document.getElementsByClassName('cho-container');

        mp.checkout({
            preference: {
                id: "{{ $preference->id}}"
            },
            render: {
                container: '#cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Pay', // Cambia el texto del botón de pago (opcional)
            }
        });

    </script>

@endsection

