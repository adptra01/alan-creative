<div>
    @if ($transactions == null)
    @else
        <div class="alert alert-success my-3" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                    <i class="bx bx-bookmarks bx-sm text-success"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2 fw-bold">Checkout Clear</div>
                    <a class="btn btn-primary" href="{{ route('print.bill', $transactions->first()->order_code) }}" role="button">Button</a>
                </div>
            </div>
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
