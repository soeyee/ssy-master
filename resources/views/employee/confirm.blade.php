<!-- resources/views/employee/confirm.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Employee Registration</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS CDN -->
</head>

<body class="bg-gray-100">
<div class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-10">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Confirm Your Information</h1>

    <form action="/employee/store" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Name</label>
            <div class="w-3/4 text-gray-600">{{ $validated['name'] }}</div>
            <input type="hidden" name="name" value="{{ $validated['name'] }}">
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Email</label>
            <div class="w-3/4 text-gray-600">{{ $validated['email'] }}</div>
            <input type="hidden" name="email" value="{{ $validated['email'] }}">
        </div>

        <!-- Password (Hidden) -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Password</label>
            <div class="w-3/4 text-gray-600">******</div>
            <input type="hidden" name="password" value="{{ $validated['password'] }}">
        </div>

        <!-- Phone -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Phone</label>
            <div class="w-3/4 text-gray-600">{{ $validated['phone'] }}</div>
            <input type="hidden" name="phone" value="{{ $validated['phone'] }}">
        </div>

        <!-- Postal Code -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Postal Code</label>
            <div class="w-3/4 text-gray-600">{{ $validated['postal_code'] }}</div>
            <input type="hidden" name="postal_code" value="{{ $validated['postal_code'] }}">
        </div>
        <!-- Address -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Country</label>
            <div class="w-3/4 text-gray-600">{{ $validated['country'] }}</div>
            <input type="hidden" name="country" value="{{ $validated['country'] }}">
        </div>


        <!-- Address -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Address</label>
            <div class="w-3/4 text-gray-600">{{ $validated['address'] }}</div>
            <input type="hidden" name="address" value="{{ $validated['address'] }}">
        </div>

        <!-- Gender -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Gender</label>
            <div class="w-3/4 text-gray-600">
                @if ($validated['gender'] == 0)
                    Male
                @else
                    Female
                @endif
            </div>
            <input type="hidden" name="gender" value="{{ $validated['gender'] }}">
        </div>

        <!-- Languages -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Languages</label>
            <div class="w-3/4 text-gray-600">{{ implode(', ', $validated['languages'] ?? []) }}</div>
            <input type="hidden" name="languages" value="{{ implode(', ', $validated['languages'] ?? []) }}">
        </div>

        <!-- PDF File -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">PDF File</label>
            <div class="w-3/4 text-gray-600">{{ $validated['pdf_file']->getClientOriginalName() }}</div>
        </div>

        <!-- Image -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Image</label>
            <img src="{{ asset('storage/' . session()->get('upload')['image']) }}" alt="Uploaded Image" class="w-32 h-32 object-cover rounded-md shadow-md">
        </div>

        <!-- Comments -->
{{--        <div class="flex items-center space-x-4 mb-6">--}}
{{--            <label class="w-1/4 text-lg font-medium text-gray-700">Comments</label>--}}
{{--            <div class="w-3/4 text-gray-600">{{ $validated['comments'] ?? 'N/A' }}</div>--}}
{{--            <input type="hidden" name="comments" value="{{ $validated['comments'] ?? '' }}">--}}
{{--        </div>--}}

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Confirm and Register
            </button>
        </div>
    </form>
</div>
</body>

</html>
