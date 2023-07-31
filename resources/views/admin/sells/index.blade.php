 <x-admin.layout.master>

     @slot('title')
         Book-Sell
     @endslot
     <main id="main" class="main">

         <div class="pagetitle">
             <h1>Book Sell</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                     <li class="breadcrumb-item active">BookList</li>
                 </ol>


             </nav>
         </div><!-- End Page Title -->

         <section class="section dashboard">
             <x-alert-message.alert />
             <!-- HTML Form using Bootstrap 5 -->
             <div class="container-fluid">
                 <div class="card">
                     <div class="card-header"></div>
                     <div class="card-body">
                       <div class="errorDiv">
                        
                    </div>
                         <form id="bookForm" method="post">
                          @csrf
                             <div class="row mb-3">
                                 <div class="col-md-6">
                                     <label for="customerName" class="form-label">Customer Name:</label>
                                     <input type="text" class="form-control" id="customerName" name="customerName"
                                         required>
                                 </div>
                                 <div class="col-md-6">
                                     <label for="phoneNumber" class="form-label">Phone Number:</label>
                                     <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                         required>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="col-md-6">
                                     <label for="bookSelect" class="form-label">Select a Book:</label>
                                     <select class="form-select" id="bookSelect" name="bookSelect">
                                         <option value="">Select Book</option>

                                         @foreach ($books as $book)
                                             <option value="{{ $book->id }}" data-price="{{ $book->price }}">
                                                 {{ $book->title }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 <div class="col-md-6">
                                     <label for="bookQuantity" class="form-label">Quantity:</label>
                                     <input type="number" class="form-control" id="bookQuantity" name="bookQuantity"
                                         required>
                                 </div>

                             </div>

                             <div class="row mb-3">

                                 <div class="col-md-6">
                                     <label for="bookPrice" class="form-label">Unit Price:</label>
                                     <input type="text" class="form-control" id="bookPrice" name="bookPrice"
                                         readonly>
                                 </div>
                                 <div class="col-md-6">
                                     <label for="bookTotalPrice" class="form-label">Total Price:</label>
                                     <input type="text" class="form-control" id="bookTotalPrice"
                                         name="bookTotalPrice" readonly>
                                 </div>
                             </div>

                             <button type="button" class="btn btn-primary add_row" id="addRowBtn">Add Row</button>
                         </form>
                     </div>
                 </div>

             </div>
           <div class="bg-white">
              <table class="table">
                 <thead>
                     <tr>
                         <th>Sl No</th>
                         <th>Product</th>
                         <th>Unit Price</th>
                          <th>Quantity</th>
                         <th>Total Price</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody class="tbody">
                    
                     @foreach ($sellbooks as $key=>$sellbook)
                       
                     
                     <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $sellbook->book->title }}</td>
                         <td>{{ $sellbook->book->price }}</td>
                         <td>{{ $sellbook->quantity }}</td>
                         <td>{{ $sellbook->total_price }}</td>
                         <td><a href="" data-id="{{ $sellbook->id }}" class="deleteRow"><i class="fas fa-trash text-danger"></i></a></td>
                     </tr>
                     @endforeach
                     <!-- Add more product rows here -->
                 </tbody>
                  
                {{-- <tfoot>
                   <tr>
                     <td colspan="4" class="justif-content-end"><a href="" class="btn btn-sm btn-success">Coifirm Sell</a></td>
                   </tr>
                </tfoot> --}}
                
                
             </table>
              <div class="d-flex justify-content-center">
                <div>
                    <p class="fs-5">Total Price: <span id="totalPrice1" class="text-dark">Tk 0</span></p>
                </div>
                 <div class="ms-5">
                     <a href="" class="btn btn-sm btn-success confirmSell">Confirm Sell</a>
                 </div>
              </div>
             

           </div>

         </section>

     </main><!-- End #main -->



    <x-admin.ajax.sell_ajax/>









 </x-admin.layout.master>
