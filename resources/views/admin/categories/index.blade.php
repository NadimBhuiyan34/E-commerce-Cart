<x-admin.layout.master>

    @slot('title')
        Category
    @endslot
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Catogory</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">CategoryList</li>
                </ol>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#cateoryModal">
                    Add Cateory
                </button>
                {{-- <button id="addCategoryBtn" class="btn btn-primary btn-sm">Add Category</button> --}}
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <x-alert-message.alert />
          <table id="dataTable" class="table">
    <thead>
        <tr>
            <th>SL No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
            <!-- Add more table headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key=>$category)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->is_active }}</td>
                <td>
                   <button class="btn btn-success btn-sm">Edit</button>
                   <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
 





        </section>

    </main><!-- End #main -->






    {{-- add category modal form --}}
 <x-admin.modal.category_add_modal />
    
  <!-- Add jQuery library (you can host it or use a CDN) -->

 

 
  <x-admin.ajax.category_ajax />
</x-admin.layout.master>