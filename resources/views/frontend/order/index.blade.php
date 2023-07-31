<x-frontend.layout.master>

    <x-slot name="title">Shopping-Cart</x-slot>

    <section style="margin-top:50px">
        <div class="container">
            @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

            <div class="card">
                <div class="card-header">All Orders</div>
                <div class="card-body">
                  

                      
                                <table class="table table-sm p-3">
                                    <thead>
                                        <th>Sl No</th>
                                        <th>Order Code</th>
                                        <th>Delivery Type</th>
                                        <th>Total Amount</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key=>$order)
                                            <tr>

                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $order->order_code }}</td>
                                                <td>{{ $order->delivery_type }}</td>
                                                <td>{{ $order->delivery_type }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td><button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#orderModal{{ $order->id }}">
                                                        Details
                                                    </button></td>
                                              </tr>


  <!-- Button trigger modal -->
 

<!-- Modal -->
<div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
     
            
                    @foreach ($order->orderdetails as $item)
                     <label for="">Item : {{ $item->title }}</label><br>
                     <label for="">Qunatity :{{ $item->quantity }}</label>
                    @endforeach
                 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







                                            
                                        @endforeach
                                        <!-- Button trigger modal -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </section>

</x-frontend.layout.master>
