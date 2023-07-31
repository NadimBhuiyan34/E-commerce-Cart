<x-frontend.layout.master>
    <x-slot name="title">Home</x-slot>
    <div class="container d-flex justify-content-center" style="margin-top:100px;margin-bottom:100px">

        <div class="row">
           
                  @foreach ($books as $book)
                <div class="col-md-4 mt-2">


                    <div class="card">
                        <div class="card-body">
                            <div class="" style="height:150px">

                                <img src="https://static.vecteezy.com/system/resources/previews/009/384/332/original/old-vintage-book-clipart-design-illustration-free-png.png"
                                    class="card-img img-fluid" width="96" height="350" alt="">


                            </div>
                        </div>

                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h6 class="font-weight-semibold mb-2">
                                    <a href="#" class="text-default mb-2" data-abc="true">{{ $book->title }}</a>
                                </h6>

                                <a href="#" class="text-muted" data-abc="true">{{ $book->category->title }}</a>
                            </div>

                            <h3 class="mb-0 font-weight-semibold">{{ $book->price }} TK</h3>

                            <div>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                            </div>

                            <div class="text-muted mb-3">34 reviews</div>

                            <button type="button" class="btn bg-cart btn-success btn-sm cartAdd" data-id="{{ $book->id }}"><i
                                    class="fa fa-cart-plus mr-2"></i> Add to
                                cart</button>


                        </div>
                    </div>




                </div>
            @endforeach
             
            



















        </div>
    </div>
      
    <x-frontend.ajax.cart_ajax /> 

</x-frontend.layout.master>
