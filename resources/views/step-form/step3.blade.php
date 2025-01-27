<form action="{{ route('step-form.store', 3) }}" method="POST">
    @csrf
    <label for="phone">Phone</label>
    <input type="text" name="phone" value="{{ $data['phone'] ?? '' }}">
    @error('phone') <p>{{ $message }}</p> @enderror

    <label for="address">Address</label>
    <input type="text" name="address" value="{{ $data['address'] ?? '' }}">
    @error('address') <p>{{ $message }}</p> @enderror

    <button type="submit">Submit</button>
</form>
