@extends("layouts.app")
@php
    require __DIR__. '/../../../vendor/autoload.php';
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 75.56;
    $preference->items = array($item);
    $preference->save();
@endphp
@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-12">
                <p>Total: $550</p>

            </div>
        </div>
        <div class="row">

        </div>
        <div id="cho-container">
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

