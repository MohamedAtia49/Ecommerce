<div>
    @if (session()->has('cart'))
        @foreach ($cart as $id => $details)
        <?php $total = 0 ?>
            <tr>
                <td class="product-thumbnail">
                    <img src="{{ Storage::url($details['image']) }}" alt="Image" class="img-fluid" width="80">
                </td>
                <td class="product-name">
                    <h2 class="h5 text-black">{{ $details['name'] }}</h2>
                </td>
                <td>${{ $details['price'] }}</td>
                <td>
                    <div class="input-group mb-3 d-flex align-items-center quantity-container"
                        style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-black decrease" wire:click="decrement({{ $id }})">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center quantity-amount"
                            value="{{ $quantities[$id] }}" wire:model.live="quantities.{{ $id }}"
                            aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-black increase" wire:click="increment({{ $id }})">&plus;</button>
                        </div>
                    </div>
                </td>
                <td>${{ $total += $details['price'] * $quantities[$id] }}</td>
                <td><a href="{{ route('frontend.remove.cart', $id) }}" class="btn btn-danger">X</a></td>
            </tr>
        @endforeach
    @endif
</div>
