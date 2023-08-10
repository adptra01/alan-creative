<div>
    <div class="row gap-4 mb-3">
        @foreach ($products as $product)
            @if ($cart->where('id', $product->id)->count())
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header text-center">
                            <h4 class="card-text text-primary fw-bold">{{ $product->name }}</h4>
                        </div>
                        <img src="{{ Storage::url($product->image) }}" class="card-img" alt="..." width="200"
                            height="200" style="object-fit: cover">
                        <button type="submit" class="btn btn-primary m-3 disabled">Submit</button>
                    </div>
                </div>
            @else
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header text-center">
                            <h4 class="card-text text-primary fw-bold">{{ $product->name }}</h4>
                        </div>
                        <img src="{{ Storage::url($product->image) }}" class="card-img" alt="..." width="200"
                            height="200" style="object-fit: cover">
                        <form wire:submit.prevent="addToCart({{ $product->id }})" action="" class=""
                            method="POST">
                            @csrf
                            <input type="number" class="form-control d-none" wire:model="quantity.{{ $product->id }}">
                            <button type="submit" class="btn btn-primary m-3">Submit</button>
                            <div wire:loading>
                                Processing Payment...
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
