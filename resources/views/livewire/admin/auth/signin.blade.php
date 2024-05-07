<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <form wire:submit.prevent="authenticate">
        <input type="email" wire:model="email" placeholder="Email">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <input type="password" wire:model="password" placeholder="Password">
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Login</button>
    </form>

    <a href="{{route('register')}}" >Register</a>
</div>