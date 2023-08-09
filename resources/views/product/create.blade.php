<!-- Modal trigger button -->
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalId">
    Add Product
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Product information </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name Product</label>
                            <input type="text" class="form-control" name="name" id="name"
                                aria-describedby="helpId" placeholder="Enter name product">
                            @error('name')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price Product</label>
                            <input type="number" class="form-control" name="price" id="price"
                                aria-describedby="helpId" placeholder="Enter price product">
                            @error('price')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image product</label>
                    <input type="file" class="form-control" name="image" id="image" aria-describedby="helpId"
                        placeholder="Enter image product">
                    @error('price')
                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
