<form action="{{ route('step-form.store', 2) }}" method="POST">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ $data['email'] ?? '' }}">
    @error('email') <p>{{ $message }}</p> @enderror
    <button type="submit">Next</button>
</form>
