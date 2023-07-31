<div class="modal fade" id="cateoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white center">
                    New Category Add
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errorDiv">
                        
                    </div>
                    <form class="row g-3" role="form" id="categoryForm" method="post">
                      @csrf
                        <br>
                        <div class="col-md-12">
                            <label class="form-check-label" for="titleInput">
                                Title
                            </label>
                            <input type="text" class="form-control" id="titleInput" name="title">
                        </div>
                        <div class="col-md-12">
                            <label class="form-check-label" for="descriptionInput">
                                Description
                            </label>
                            <input type="text" class="form-control" id="descriptionInput" name="description">
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
                    <button type="button" class="btn btn-success m-auto w-50 add_category btn-sm add_category" id="addButton">ADD <i
                            class="fa-solid fa-paper-plane"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>