<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="register">
        <input type="name" wire:model="name" placeholder="Name">
        @error('name') <span class="error">{{ $message }}</span> @enderror

        <input type="email" wire:model="email" placeholder="Email">
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <input type="password" wire:model="password" placeholder="Password">
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <input type="password" wire:model="passwordConfirmation" placeholder="Confirm Password">

        <button type="submit">Register</button>
    </form>
</div>