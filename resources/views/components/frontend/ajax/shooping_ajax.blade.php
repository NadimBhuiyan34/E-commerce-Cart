<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {

        // delete cart from shopping bag
        $(document).on('click', '.deleteCart', function(e) {
            e.preventDefault();
            let cartId = $(this).data('id');
            let price = $(this).data('price');



            $.ajax({
                url: "{{ route('carts.destroy') }}",
                method: 'post',
                data: {
                    cartId: cartId,
                    price: price

                },
                success: function(res) {
                    if (res.status == 'success') {



                        let deliveryCostValue = parseInt($('#deliveryCostLabel').text());
                        let totalValue = deliveryCostValue + parseInt(res.totalprice);

                        

                        $('#cartCount').text(res.cartCount);
                        $('#totalPrice').text(res.totalprice);
                        $('#totalPrice2').text(res.totalprice);
                        $('#totalAmount').text(totalValue);

                        $('.table').load(location.href + ' .table');

                    }
                }

            });



        });


        // increment quantity
        $(document).on('click', '.incrementQuantity', function(e) {
            e.preventDefault();

            let cartId = $(this).data('id');
            let quantityType = 'add';
            console.log(cartId);
            $.ajax({
                url: "{{ route('quantity.store') }}",
                method: 'post',
                data: {
                    cartId: cartId,
                    quantityType: quantityType

                },
                success: function(res) {
                    if (res.status == 'success') {

                          let deliveryCostValue = parseInt($('#deliveryCostLabel').text());
                        let totalValue = deliveryCostValue + parseInt(res.totalprice);
                        $('#totalPrice').text(res.totalprice);
                        $('#totalPrice2').text(res.totalprice);
                        $('#totalAmount').text(totalValue);
                        $('.table').load(location.href + ' .table');

                    }
                }

            });

        });


        //  decrement quantity
        $(document).on('click', '.decrementQuantity', function(e) {
            e.preventDefault();

            let cartId = $(this).data('id');


            $.ajax({
                url: "{{ route('quantity.store') }}",
                method: 'post',
                data: {
                    cartId: cartId

                },
                success: function(res) {
                    if (res.status == 'success') {

                         let deliveryCostValue = parseInt($('#deliveryCostLabel').text());
                        let totalValue = deliveryCostValue + parseInt(res.totalprice);
                        $('#totalPrice').text(res.totalprice);
                        $('#totalPrice2').text(res.totalprice);
                        $('#totalAmount').text(totalValue);
                        $('.table').load(location.href + ' .table');

                    }
                }

            });

        });


        // deliverytype cost update

        const deliveryTypeSelect = document.getElementById('deliveryType');
        const deliveryCostLabel = document.getElementById('deliveryCostLabel');
        const totalPriceLabel = document.getElementById('totalPrice2');
        const totalAmountLabel = document.getElementById('totalAmount');


        const deliveryCosts = {
            standard: 150,
            express: 250,
            nextDay: 350

        };

        function updateDeliveryCostAndTotalAmount() {
            const selectedDeliveryType = deliveryTypeSelect.value;
            const cost = deliveryCosts[selectedDeliveryType] || 0;
            const totalPrice = parseFloat(totalPriceLabel.textContent);
            const totalAmount = cost + totalPrice;

            deliveryCostLabel.textContent = cost;
            totalAmountLabel.textContent = totalAmount.toFixed(2) + ' Tk';
        }


        deliveryTypeSelect.addEventListener('change', updateDeliveryCostAndTotalAmount);


        updateDeliveryCostAndTotalAmount();





    });
</script>
