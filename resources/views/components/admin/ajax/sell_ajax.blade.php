 <script src="https://code.jquery.com/jquery-3.7.0.min.js"
     integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
 {{-- price update --}}
 <script>
     $(document).ready(function() {
         // update book price when select book
         $('#bookSelect').change(function() {
             updateBookPrice();
         });
         //  update total price based on quantity
         $('#bookQuantity').on('input', function() {
             updateBookPriceAndTotal();
         });
         // Function to update the price input field based on the selected book
        

         // Function to update the totalprice input field based on the book quantity




         $(document).on('click', '.add_row', function(e) {
             e.preventDefault();
             let customerName = $('#customerName').val();
             let phoneNumber = $('#phoneNumber').val();
             let bookId = $('#bookSelect').val();
             let bookQuantity = $('#bookQuantity').val();
             let totalPrice = $('#bookTotalPrice').val();

             $.ajax({
                 url: "{{ route('sells.store') }}",
                 method: 'post',
                 data: {
                     customerName: customerName,
                     phoneNumber: phoneNumber,
                     bookId: bookId,
                     bookQuantity: bookQuantity,
                     totalPrice: totalPrice
                 },
                 success: function(res) {
                     if (res.status == 'success') {

                         $('#bookPrice').val('');
                         $('#bookQuantity').val('');
                         $('#bookTotalPrice').val('');
                         $('#bookSelect').val('');
                         // $('#bookForm')[0].reset();


                         $('.table').load(location.href + ' .table');
                         calculateTotalPrice(parseInt(res.total_price));

                     }
                 },
                 error: function(err) {
                     let error = err.responseJSON;
                     $.each(error.errors, function(index, value) {
                         $('.errorDiv').append('<span class="text-danger">' + value +
                             '</span>' + '<br>');
                     });
                 }
             });
         });

         //  delete row
         $(document).on('click', '.deleteRow', function(e) {
             e.preventDefault();
             let sellBookId = $(this).data('id');
             

             if (confirm('Are you sure to delete product ??')) {
                 $.ajax({
                     url: "{{ route('sells.delete') }}",
                     method: 'post',
                     data: {
                         sellBookId: sellBookId
                    
                     },
                     success: function(res) {
                         if (res.status == 'success') {




                             $('.table').load(location.href + ' .table');
                             calculateTotalPrice(0,parseInt(res.total_price));
                         }
                     }

                 });
             }


         });

        //  confirm sell
         $(document).on('click', '.confirmSell', function(e) {
             e.preventDefault();
             
             

             if (confirm('Are you sure to Confirm Sell ??')) {
                 $.ajax({
                     url: "{{ route('sells.confirm') }}",
                     method: 'get',
                     
                     success: function(res) {
                         if (res.status == 'success') {




                             $('.table').load(location.href + ' .table');
                             calculateTotalPrice(0,parseInt(res.total_price));
                         }
                     }

                 });
             }


         });
         // Call the function initially on page load to set the initial price
         updateBookPrice();
         updateBookPriceAndTotal();
         calculateTotalPrice();

     

     });

    //  all function
 function updateBookPrice() {
             const selectedBookId = $('#bookSelect').val();
             const selectedBookPrice = $('#bookSelect option:selected').data('price');

             if (selectedBookId && selectedBookPrice) {
                 $('#bookPrice').val(selectedBookPrice);
             } else {
                 $('#bookPrice').val('');
             }
         }
     function updateBookPriceAndTotal() {
         const selectedBookId = $('#bookSelect').val();
         const selectedBookPrice = $('#bookSelect option:selected').data('price');
         const quantity = parseInt($('#bookQuantity').val());

         if (selectedBookId && selectedBookPrice && quantity) {
             $('#bookPrice').val(selectedBookPrice);
             const totalPrice = selectedBookPrice * quantity;
             $('#bookTotalPrice').val(totalPrice);
         } else {
             $('#bookPrice').val('');
             $('#bookTotalPrice').val('');
         }
     }
         function calculateTotalPrice(add_price=0,delete_price=0) {
             let totalPrice1 =add_price-delete_price;
              
             $('.table tbody tr').each(function() {
                 let price = parseFloat($(this).find('td:nth-child(5)').text().replace('$', ''));
                 totalPrice1 += price;


             });
             if(isNaN(totalPrice1) || totalPrice1<0)
             {
                 totalPrice1=0;
             }
             $('#totalPrice1').text(totalPrice1+' Tk');


         }


 </script>
