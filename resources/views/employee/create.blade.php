<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS CDN -->
</head>

<body class="bg-gray-100">
<div class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-10">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Employee Registration Form</h1>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="/employee/confirm" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="name" class="w-1/4 text-lg font-medium text-gray-700">Name</label>
            <div class="w-3/4">
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="email" class="w-1/4 text-lg font-medium text-gray-700">Email</label>
            <div class="w-3/4">
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="password" class="w-1/4 text-lg font-medium text-gray-700">Password</label>
            <div class="w-3/4">
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Phone -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="phone" class="w-1/4 text-lg font-medium text-gray-700">Phone</label>
            <div class="w-3/4">
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('phone') border-red-500 @enderror">
                @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- Country -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="gender" class="w-1/4 text-lg font-medium text-gray-700">Country</label>
            <div class="w-3/4">
                <select name="country" id="country" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('country') border-red-500 @enderror">
                    <option value="">-- Select a Country --</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('gender')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Postal Code -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="postal_code" class="w-1/4 text-lg font-medium text-gray-700">Postal Code</label>
            <div class="w-3/4">
            <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" class="w-3/4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('postal_code')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <!-- Address -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="address" class="w-1/4 text-lg font-medium text-gray-700">Address</label>
            <div class="w-3/4">
            <textarea name="address" id="address" value="{{ old('address') }}" rows="3" class="w-3/4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            @error('address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <!-- Gender -->
{{--        <div class="flex items-center space-x-4 mb-6">--}}
{{--            <label for="gender" class="w-1/4 text-lg font-medium text-gray-700">Gender</label>--}}
{{--            <div class="w-3/4">--}}
{{--                <select name="gender" id="gender" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('gender') border-red-500 @enderror">--}}
{{--                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>--}}
{{--                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>--}}
{{--                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>--}}
{{--                </select>--}}
{{--                @error('gender')--}}
{{--                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Languages -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Languages</label>
            <div class="w-3/4 space-x-4 flex items-center">
                <label><input type="checkbox" name="languages[]" value="English" {{ in_array('English', old('languages', [])) ? 'checked' : '' }} class="mr-2"> English</label>
                <label><input type="checkbox" name="languages[]" value="Japanese" {{ in_array('Japanese', old('languages', [])) ? 'checked' : '' }} class="mr-2"> Japanese</label>

            @error('languages')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <!-- Relocation -->
        <div class="flex items-center space-x-4 mb-6">
            <label class="w-1/4 text-lg font-medium text-gray-700">Gender</label>
            <div class="w-3/4 flex space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="0" {{ old('gender') == '0' ? 'checked' : '' }} class="form-radio text-indigo-600">
                    <span class="ml-2 text-gray-600">Male</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} class="form-radio text-yellow-600">
                    <span class="ml-2 text-gray-600">Female</span>
                </label>
                @error('gender')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- PDF Upload -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="pdf_file" class="w-1/4 text-lg font-medium text-gray-700">Upload PDF</label>
            <div class="w-3/4">
            <input type="file" name="pdf_file" id="pdf_file" value="{{ old('pdf_file') }}" class="w-3/4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('pdf_file')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <!-- Image Upload -->
        <div class="flex items-center space-x-4 mb-6">
            <label for="image" class="w-1/4 text-lg font-medium text-gray-700">Upload Image</label>
            <div class="w-3/4">
            <input type="file" name="image" id="image" value="{{ old('image') }}" class="w-3/4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Submit
            </button>
        </div>
    </form>
</div>
</body>

</html>
