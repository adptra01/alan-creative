<div>
    <!-- Offer -->
    <div class="mb-3">
        <label for="" class="form-label">New Costumer</label>
        <input type="text" wire:model="identifier" name="customer" class="form-control" placeholder="Enter customer name"
            aria-label="Enter customer name">
    </div>

    <!-- Price Details -->
    <h6>Price Details</h6>
    @foreach ($cart as $item)
        <dl class="row mb-0">
            <dt class="col-md fw-normal align-self-center">{{ $item->name }}</dt>
            <dd class="col-md text-end">
                <div class="input-group g-4">
                    <button wire:click="decrementQty('{{ $item->rowId }}')" class="btn btn-secondary btn-sm"
                        type="button">-</button>
                    <input type="text" class="form-control text-center" value="{{ $item->qty }}" readonly>
                    <button wire:click="incrementQty('{{ $item->rowId }}')" class="btn btn-secondary btn-sm"
                        type="button">+</button>
                </div>
            </dd>
            <dd class="col-md align-self-center text-end">
                <button wire:click="removeFromCart('{{ $item->rowId }}')" class="btn btn-danger"
                    type="button">X</button>
            </dd>
        </dl>
    @endforeach

    <hr class="mx-n4">
    <dl class="row mb-0">
        <dt class="col-6">Total</dt>
        <dd class="col-6 fw-medium text-end mb-0">{{ Cart::subtotal(0, '.', ',') }}</dd>
    </dl>
    <div class="d-grid my-3">
        <button wire:click="cartCheckout" class="btn btn-primary btn-next">Place Order</button>
        @livewire('print-bill')
    </div>
    <div wire:loading>
        <p class="text-center text-primary">Processing...................</p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mb-3" role="alert">
            <div class="d-flex gap-3">
                <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                    <i class="bx bx-bookmarks bx-sm text-danger"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2 fw-bold">Costumer</div>
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }}
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
                    <i class="bx bx-bookmarks bx-sm text-danger"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="fw-medium fs-5 mb-2 fw-bold">Cart</div>
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
