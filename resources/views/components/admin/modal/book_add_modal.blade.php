<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <div class="col-md-6">
                                     <label for="categorySelect" class="form-label">Select a Category:</label>
                                     <select class="form-select" id="categorySelect" name="categorySelect">
                                         <option value="">Select Book</option>

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

                        


                </div>
                <div class="modal-footer shadow">
                    <button type="button" class="btn btn-success m-auto w-50 btn-sm add_book" id="addButton">ADD <i
                            class="fa-solid fa-paper-plane"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>