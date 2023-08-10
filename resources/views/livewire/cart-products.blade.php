<div>
    <!-- Offer -->
    <h6 class="label-form">Customer</h6>
    <input type="text" name="customer" class="form-control mb-4" placeholder="Enter customer name"
        aria-label="Enter customer name">

    <!-- Price Details -->
    <h6>Price Details</h6>
    @foreach ($cart as $item)
        <dl class="row mb-0">
            <dt class="col-md-6 fw-normal align-self-center">{{ $item->name }}</dt>
            <dd class="col-md text-end">
                <div class="input-group g-4">
                    <button wire:click="decrementQty('{{ $item->rowId }}')" class="btn btn-secondary btn-sm"
                        type="button">-</button>
                    <input type="text" class="form-control text-center" value="{{ $item->qty }}" readonly>
                    <button wire:click="incrementQty('{{ $item->rowId }}')" class="btn btn-secondary btn-sm"
                        type="button">+</button>
                </div>
            </dd>
            <dd class="col-md-2 align-self-center text-end">
                <button wire:click="removeFromCart('{{ $item->rowId }}')" class="btn btn-danger"
                    type="button">X</button>
            </dd>
        </dl>
    @endforeach

    <hr class="mx-n4">
    <dl class="row mb-0">
        <dt class="col-6">Total</dt>
        <dd class="col-6 fw-medium text-end mb-0">{{ Cart::subtotal() }}</dd>
    </dl>
</div>
