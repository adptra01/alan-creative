<x-app>
    <x-slot name="title">Products Page</x-slot>
    @include('layouts.table')
    <div class="card">
        <div class="card-header">
            @include('product.create')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $no => $item)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ Storage::url($item->image) }}" class="rounded-circle" width="30"
                                        height="30" alt="user image"></td>

                                <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
