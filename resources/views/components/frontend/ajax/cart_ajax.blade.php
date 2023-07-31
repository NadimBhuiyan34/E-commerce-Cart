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

         // cart add
         $(document).on('click', '.cartAdd', function(e) {
             e.preventDefault();
             let bookId = $(this).data('id');


             $.ajax({
                 url: "{{ route('carts.store') }}",
                 method: 'post',
                 data: {
                     bookId: bookId
                 },
                 success: function(res) {
                     if (res.status == 'success') {


                         $('#cartCount').text(res.cartCount);

                     }
                 }
             });
         });
         // delete book
        
     });
 </script>
