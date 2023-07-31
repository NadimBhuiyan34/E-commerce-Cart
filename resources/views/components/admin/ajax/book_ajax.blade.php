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

         $(document).on('click', '.add_book', function(e) {
             e.preventDefault();
             let title = $('#titleInput').val();
             let description = $('#descriptionInput').val();
             let categoryId = $('#categorySelect').val();
             console.log(categoryId);
             let price = $('#priceInput').val();
             let quantity = $('#quantityInput').val();
             let discount = $('#discountInput').val();
             let isActive = $('#isActiveInput').is(':checked') ? 1 : 0;
             $.ajax({
                 url: "{{ route('books.store') }}",
                 method: 'post',
                 data: {
                     title: title,
                     price: price,
                     quantity: quantity,
                     discount: discount,
                     description: description,
                     categoryId: categoryId,
                     isActive: isActive
                 },
                 success: function(res) {
                     if (res.status == 'success') {
                         $('#bookModal').modal('hide');
                         $('#bookForm')[0].reset();

                         $('.table').load(location.href + ' .table');
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
         // delete book
         $(document).on('click', '.deteleBook', function(e) {
             e.preventDefault();
             let bookId = $(this).data('id');


             if (confirm('Are you sure to delete book ??')) {
                 $.ajax({
                     url: "{{ route('books.destroy') }}",
                     method: 'post',
                     data: {
                         bookId: bookId

                     },
                     success: function(res) {
                         if (res.status == 'success') {




                             $('.table').load(location.href + ' .table');

                         }
                     }

                 });
             }


         });


     });
 </script>
