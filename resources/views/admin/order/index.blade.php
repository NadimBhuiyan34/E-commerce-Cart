 <x-admin.layout.master>

     @slot('title')
         admin-Order
     @endslot
     <main id="main" class="main">

         <div class="pagetitle">
             <h1>Order</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                     <li class="breadcrumb-item active">Orderr list</li>
                 </ol>

                 {{-- <button id="addCategoryBtn" class="btn btn-primary btn-sm">Add Category</button> --}}
             </nav>
         </div><!-- End Page Title -->

         <section class="section dashboard">
             <x-alert-message.alert />
             <table id="dataTable" class="table">
                 <thead>
                     <tr>
                         <th>SL No</th>
                         <th>Order Code</th>
                         <th>Address</th>
                         <th>Delivery Type</th>
                         <th>Date</th>
                         <th>Status</th>
                         <th>Action</th>
                         <!-- Add more table headers as needed -->
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($orders as $key => $order)
                         <tr>
                             <td>{{ $key + 1 }}</td>
                             <td>{{ $order->order_code }}</td>
                             <td>{{ $order->address }}</td>
                             <td>{{ $order->delivery_type }}</td>
                             <td>{{ $order->created_at }}</td>
                             <td>{{ $order->status }}</td>
                             <td class="d-flex gap-1">
                                 <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                     data-bs-target="#editModal{{ $order->id }}">
                                     Edit
                                 </button>
                                  <form action="{{ route('orders.destroy',['order'=>$order->id]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                     <button class="btn btn-danger btn-sm" data-id="" type="submit">Delete</button>
                                  </form>
                             </td>
                         </tr>

                         <!-- Button trigger modal -->


                         <!-- Modal -->
                         <div class="modal fade" id="editModal{{ $order->id }}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                                            @csrf
                                            @method('patch')
                                             <div>
                                                 <label for="">Status</label>
                                                 <select class="form-select form-select-lg mb-3"
                                                     aria-label=".form-select-lg example" name="status">
                                                     <option selected>Select status</option>
                                                     <option value="Pending">Pending</option>
                                                     <option value="Processing">Processing</option>
                                                     <option value="Shipped">Shipped</option>
                                                     <option value="Delivered">Delivered</option>
                                                     <option value="Cancelled">Cancelled</option>
                                                 </select>


                                             </div>
                                             <button class="btn btn-success btn-sm">Submit</button>
                                         </form>
                                     </div>
                                    
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </tbody>
             </table>






         </section>

     </main><!-- End #main -->






     {{-- add category modal form --}}
     {{-- <x-admin.modal.book_add_modal /> --}}
     {{-- <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white center">
                    New Book Add
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errorDiv">
                        
                    </div>
                    <form class="row g-3" role="form" id="bookForm" method="post">
                      @csrf
                        <br>
                        <div class="col-md-12">
                            <label class="form-check-label" for="titleInput">
                                Title
                            </label>
                            <input type="text" class="form-control" id="titleInput" name="title">
                        </div>
                         <div class="col-md-12">
                                     <label for="categorySelect" class="form-label">Select a Category:</label>
                                     <select class="form-select" id="categorySelect" name="categorySelect">
                                         <option value="">Select Category</option>

                                         @foreach ($categories as $category)
                                             <option value="{{ $category->id }}">
                                                 {{ $category->title }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                        <div class="col-md-12">
                            <label class="form-check-label" for="descriptionInput">
                                Description
                            </label>
                            <input type="text" class="form-control" id="descriptionInput" name="description">
                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label" for="priceInput">
                                Price
                            </label>
                            <input type="number" class="form-control" id="priceInput" name="price">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-check-label" for="quantityInput">
                                Quantity
                            </label>
                            <input type="number" class="form-control" id="quantityInput" name="quantity">
                        </div>
                        <div class="col-md-12">
                            <label class="form-check-label" for="discountInput">
                                Discount
                            </label>
                            <input type="number" class="form-control" id="discountInput" name="discount">
                        </div>

                         <div class="form-check">
                            <input name="is_active" class="form-check-input" type="checkbox" value="1"
                                id="isActiveInput" checked>
                            <label class="form-check-label" for="isActiveInput">
                                Is Active
                            </label>
                        </div>


                </div>
                <div class="modal-footer shadow">
                    <button type="button" class="btn btn-success m-auto w-50 btn-sm add_book" id="addButton">ADD <i
                            class="fa-solid fa-paper-plane"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}
     <!-- Add jQuery library (you can host it or use a CDN) -->




     <x-admin.ajax.book_ajax />
 </x-admin.layout.master>
