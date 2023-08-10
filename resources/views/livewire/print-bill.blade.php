<div>
    @if ($identifier == null)
    @else
        <div class="alert alert-success mb-3" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                    <i class="bx bx-bookmarks bx-sm text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2 fw-bold">Checkout Clear</div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Cetak
                    </button>
                </div>
            </div>
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Atas Nama : {{ $identifier }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Tampilkan data cart --}}
                        @foreach ($cartData as $item)
                            <li>
                                {{ $item['name'] }} (Quantity: {{ $item['qty'] }}, Price: {{ $item['price'] }})
                                <!-- Tampilkan informasi lain yang Anda inginkan dari produk -->
                                {{ $item['price'] * $item['qty'] }}
                            </li>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
