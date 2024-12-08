<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   
    <script src="https://www.paypal.com/sdk/js?client-id=AdUmO2E4hbjOHt-_TEm4OdqyobdQzzGWr9-3rd1fPoT_zX4olOZbH4kODiPG-2gFkFKxsw5DLuLb4tl_&currency=USD"></script>


</head>
<body>

    <div id="paypal-button-container"></div>

    <script>
            paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay',
            }, 
          
            createOrder: function(data, actions) {
            return actions.order.create({ // Corrección: actions.order.create
                purchase_units: [{
                    amount: {
                        value: 100.00 // Valor de tu compra. Asegúrate de usar comillas para el valor.
                    }
                }]
            });
        },

        onApprove: function(data, actions) {
        return actions.order.capture().then(function (detalles) {

            window.location.href="completado.html"; 

            //console.log(detalles); // Esto debería mostrar el objeto completo de los detalles de la transacción.
        // }).catch(function (error) {
        //     console.error('Error capturando la orden:', error); // Manejo de errores en la captura.
        });


        },
        //funcion para cancelar el pago
        onCancel: function(data) {
            alert('Pago cancelado');
            console.log(data);
        }


        }).render('#paypal-button-container');
    </script>
    
</body>
</html>
