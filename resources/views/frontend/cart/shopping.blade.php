<x-frontend.layout.master>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/shopping_cart.css') }}">
    <x-slot name="title">Shopping-Cart</x-slot>

    <section style="margin-top:50px">


        @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif

<!-- Your other view content here -->

        <div class="container">
            <a href="{{ route('homepage') }}" class="btn btn-sm btn-outline-primary mb-2"><i
                    class="fa-solid fa-caret-left"></i>Continue Shooping</a>
            <div class="row">

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-white text-center fs-5"><i
                                class="fa-solid fa-cart-flatbed-suitcase"></i> Shopping Bag </div>
                        <table class="table table-sm p-3">
                            <thead>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                                <th>Total Price</th>
                            </thead>
                            <tbody>
                                @foreach ($shoppingCart as $product)
                                    <tr>
                                        <td>{{ $product->book->title }}</td>
                                        <td>{{ $product->book->price }}</td>
                                        <td class="d-flex">
                                            <button class="btn btn-danger btn-sm decrementQuantity"
                                                data-id="{{ $product->id }}"><i class="fa-solid fa-minus"></i></button>

                                            <input type="text" class="form-control w-25 text-center"
                                                value="{{ $product->quantity }}" id="bookQuantity1"
                                                data-id="{{ $product->id }}">

                                            <button class="btn btn-success btn-sm incrementQuantity"
                                                data-id="{{ $product->id }}"> <i class="fa-solid fa-plus"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm deleteCart"
                                                data-id="{{ $product->id }}"
                                                data-price="{{ $product->quantity * $product->book->price }}"><i
                                                    class="fa-solid fa-xmark"></i></button>

                                        </td>
                                        <td>{{ $product->book->price * $product->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <label for=""><strong>Total :</strong></label>
                            </div>
                            <div class="bold-text" style="padding-right: 73px">
                                <label for="" class=""><strong
                                        id="totalPrice">{{ $totalPrice }}</strong></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-white fs-5">Order Summary</div>

                        <div class="card-body">
                            <form action="{{ route('checkout.index') }}" method="post">
                                @csrf
                                <div class="">
                                    <label for="deliveryType" class="form-label">Delivery:</label>
                                    <select class="form-select" id="deliveryType" aria-label="Delivery Type" required
                                        name="deliveryType">


                                        <option selected disabled>Select delivery type</option>
                                        <option value="standard">Standard Delivery</option>
                                        <option value="express">Express Delivery</option>
                                        <option value="nextDay">Next Day Delivery</option>
                                        <!-- Add more options as needed -->
                                    </select>

                                    <div class="d-flex justify-content-between mt-4">
                                        <label for="deliveryCostLabel">Delivery-Cost:</label>
                                        <label id="deliveryCostLabel">150</label>
                                    </div>

                                    <div class="d-flex justify-content-between mt-2">
                                        <label for="">Total Price:</label>
                                        <label for="" id="totalPrice2">{{ $totalPrice }}</label>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mt-2">
                                        <label for=""><strong>Total Amount:</strong></label>
                                        <label for=""><strong id="totalAmount">{{ $totalPrice }}
                                                Tk</strong></label>
                                    </div>


                                </div>

                                @error('deliveryType')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="card-footer  d-flex justify-content-center mt-2">

                                    <button type="submit" class="btn btn-success btn-sm">CHECKOUT</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <x-frontend.ajax.shooping_ajax />
</x-frontend.layout.master>
