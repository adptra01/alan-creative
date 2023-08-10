<x-app>
    <x-slot name="title">Home Page</x-slot>
    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <p>Lorem, ipsum dolor.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id="wizard-checkout-form" onsubmit="return false">

                <!-- Cart -->
                <div class="content fv-plugins-bootstrap5 fv-plugins-framework active dstepper-block">
                    <div class="row">
                        <!-- Cart left -->
                        <div class="col-xl-8 mb-3 mb-xl-0">

                            <!-- Offer alert -->
                            <div class="alert alert-success mb-3" role="alert">
                                <div class="d-flex gap-3">
                                    <div class="flex-shrink-0 badge badge-center rounded bg-light p-3">
                                        <i class="bx bx-bookmarks bx-sm text-success"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-medium fs-5 mb-2">Available Offers</div>
                                        <ul class="list-unstyled mb-0">
                                            <li> - 10% Instant Discount on Bank of America Corp Bank Debit and
                                                Credit cards
                                            </li>
                                            <li> - 25% Cashback Voucher of up to $60 on first ever PayPal
                                                transaction. TCA
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <!-- Shopping bag -->
                            @livewire('cart-counter')
                            <label for="search" class="label-form">Searching</label>
                            {{-- <input type="text" id="search" class="form-control border shadow-none mb-3"
                                wire:model="search" placeholder="Search..." aria-label="Search..." /> --}}

                            @livewire('products-table')

                            {{-- <div class="container-fluid my-5">
                                {{ $products->links() }}
                            </div> --}}
                        </div>

                        <!-- Cart right -->
                        <div class="col-xl-4">
                            <div class="border rounded p-4 mb-3 pb-3">

                                @livewire('cart-products')
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-next">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
