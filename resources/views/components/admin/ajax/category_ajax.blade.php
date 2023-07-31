 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
 
 <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>
    <script>
        $(document).ready(function() {
                 
        $(document).on('click','.add_category',function(e){
                e.preventDefault();
                let title = $('#titleInput').val();
                let description = $('#descriptionInput').val();
                let isActive = $('#isActiveInput').is(':checked') ? 1 : 0;
                $.ajax({
                    url:"{{ route('categories.store') }}",
                    method:'post',
                    data:{title:title,description:description,isActive:isActive},
                    success:function(res){
                         if(res.status=='success'){
                            $('#cateoryModal').modal('hide');
                            $('#categoryForm')[0].reset();

                            $('.table').load(location.href+' .table');
                         }
                    },error:function(err){
                        let error=err.responseJSON;
                        $.each(error.errors,function(index,value){
                            $('.errorDiv').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
        });


            // $('#addButton').click(function() {
            //     event.preventDefault();
            //     const title = $('#titleInput').val();
            //     const  description = $('#descriptionInput').val();
            //     const isActive = $('#isActiveInput').is(':checked') ? 1 : 0;

                      
            //     $.ajax({
            //         url: '{{ route('categories.store') }}',
            //         type: 'POST',
            //         data: {
            //             '_token': '{{ csrf_token() }}',
            //             'title': title,
            //             'description': description,
            //             'isActive': isActive,
            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                  $("#titleInput").val('');
            //         $("#descriptionInput").val('');
            //         $("#isActiveInput").prop('checked', false);
            //   updateSellingTable();
            //         // Hide the modal after successful submission
            //       $("#categoryModal").modal('hide');
                         
            //                 // Update the selling table using AJAX
                            
            //             }
            //         },
            //         error: function() {
            //             alert('Error occurred while adding to selling records.');
            //         }
            //     });
            // });

           
             
        });
    </script>