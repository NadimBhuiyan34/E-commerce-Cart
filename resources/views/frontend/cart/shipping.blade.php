<x-frontend.layout.master>

    <x-slot name="title">Shopping-Cart</x-slot>

    <section style="margin-top:50px">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Shipping Address</h5>
                            <form action="{{ route('user_orders.store') }}" method="post">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city" name="city"
                                            required>
                                        @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="state" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="state" name="state"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="zipCode" class="col-sm-3 col-form-label">Zip Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="zipCode" name="zipCode"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="mobileNumber" class="col-sm-3 col-form-label">Mobile Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber"
                                            required>
                                    </div>
                                </div>
                                <input type="hidden" name="deliveryType" value="{{ $deliveryType }}">
                                <div class="row mb-3">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</x-frontend.layout.master>
