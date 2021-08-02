<?php
include 'vistas/paginas/tienda/menu-tienda.php';

$dolar = 23.72;
$correo = 'info@allonlinehn.com';

$pago = $_SESSION["total"] / $dolar;

?>


<div class="jumbotron text-center">
    <h1 class="display-4">¡Último Paso!</h1>
    <p class="lead">Estás a punto de pagar con PayPal la cantidad de:</p>
    <hr class="my-4">
    <h2>$<?php echo number_format($pago, 2); ?></h2>
    <p>Para aclaraciones contactanos a través de: <strong><?php echo $correo; ?></strong></p>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=ARvyJyKeJI1k468_psUAKaaVRUHvf5lUNn3LfrkwFvN78p6WGenAbrljKsGNFbnp08xnCdm-jT8ZLpK4&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo number_format($pago, 2); ?>'
                        },
                        description: "Compra de productos a AllOnlineHN: $<?php echo number_format($pago, 2); ?>",
                        custom: ""
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    if (transaction.status = "COMPLETED") {
                        window.location = "completo?dato=" + transaction.id;
                    } else {
                        window.location = "tienda";
                    }
                });
            },

            onCancel: function(data) {
                window.location = "tienda";
            }


        }).render('#paypal-button-container');
    </script>

</div>