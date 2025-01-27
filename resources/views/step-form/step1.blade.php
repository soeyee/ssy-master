<form action="{{ route('step-form.store', 1) }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $data['name'] ?? '' }}">
    @error('name') <p>{{ $message }}</p> @enderror
    <button type="submit">Next</button>
</form>
