<div>
    @if (session('success'))
        <div class="alert alert-primary mb-3" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                    <i class="bx bx-bookmarks bx-sm text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2">Order Successfully</div>
                    <ul class="list-unstyled mb-0">
                        <li> {{ session('success') }} </li>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif ($errors->any())
        <div class="alert alert-danger mb-3" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                    <i class="bx bx-bookmarks bx-sm text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2">Errors</div>
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li> {{ $errors }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('gagal'))
        <div class="alert alert-danger mb-3" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                    <i class="bx bx-bookmarks bx-sm text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2">Errors</div>
                    <ul class="list-unstyled mb-0">
                        <li> Your shopping cart is empty.
                        </li>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
