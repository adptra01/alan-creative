<div>
    <div class="row g-2 mb-3">
        @foreach ($products as $product)
            <div class="col-md">
                <div class="card bg-dark text-white" style="width: 15rem; height: 15rem;">
                    <img src="{{ Storage::url($product->image) }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="alert alert-primary" style="width: 12rem; height: 12rem;" role="alert">
                            <p class="card-title fw-bold">{{ $product->name }}</p>
                            <p class="card-text fw-bold">{{ $product->price }}</p>
                            @if ($cart->where('id', $product->id)->count())
                                <div class="justify-content-center text-center">
                                    <button class="btn btn-primary m-3 disabled">Added</button>
                                </div>
                            @else
                                <form wire:submit.prevent="addToCart({{ $product->id }})" class="">
                                    @csrf
                                    <input type="number" class="form-control d-none"
                                        wire:model="quantity.{{ $product->id }}">
                                    <div class="justify-content-center text-center">
                                        <button type="submit" class="btn btn-primary m-3">Submit</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
