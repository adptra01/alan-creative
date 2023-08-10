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

                            <!-- Shopping bag -->
                            @livewire('cart-counter')
                            {{-- <label for="search" class="label-form">Searching</label> --}}
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
                            @yield('btn-submit')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
