<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        @if(!$current_image && !$first_name)
            <div
                class="mb-8 bg-gradient-to-r from-brand-orange via-red-500 to-yellow-500 rounded-2xl p-8 text-white shadow-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-2">Welcome to Orange E Card! 🎉</h2>
                    <p class="text-white/90 text-lg">Let's create your digital business card. Fill in your information
                        below.</p>
                </div>
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
            </div>
        @else
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-brand-black mb-2">Edit Your Digital Card</h2>
                <p class="text-brand-gray">Update your information anytime</p>
            </div>
        @endif

        <!-- Card URL Section -->
        @if($first_name && $last_name)
            <div class="mb-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-white/80 mb-1">Your Public Card URL</p>
                        <p class="text-lg font-semibold break-all" id="cardUrl">
                            {{ url('/card') }}/{{ auth()->user()->username  }}
                        </p>
                    </div>
                    <div class="flex space-x-2 flex-shrink-0">
                        <button onclick="copyCardUrl()"
                            class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-50 transition flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                                <path
                                    d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                            </svg>
                            <span id="copyBtnText">Copy</span>
                        </button>
                        <a href="{{ url('/card') }}/{{ auth()->user()->username  }}" target="_blank"
                            class="bg-brand-orange text-white px-4 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path
                                    d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                            <span>Go to Card</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-brand-light">
                    <form action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <!-- Profile Image Section -->
                        <div class="text-center pb-6 border-b border-brand-light">
                            <label class="block text-sm font-semibold text-brand-black mb-4">
                                Profile Photo
                            </label>

                            <div class="flex flex-col items-center space-y-4">
                                <div class="relative group flex justify-center">
                                    <img id="formProfileImage" src="{{ $current_image ? asset($current_image) : '#' }}"
                                        alt="Current Profile"
                                        class="w-32 h-32 rounded-full object-cover border-4 border-brand-orange shadow-lg group-hover:scale-105 transition-transform {{ $current_image ? '' : 'hidden' }}">

                                    <div id="formProfileInitials"
                                        class="w-32 h-32 rounded-full bg-gradient-to-br from-brand-orange to-red-500 flex items-center justify-center text-white text-4xl font-bold shadow-lg {{ $current_image ? 'hidden' : '' }}">
                                        {{ substr($first_name ?: 'U', 0, 1) }}
                                    </div>

                                    <div
                                        class="absolute inset-0 rounded-full bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                        <span class="text-white text-sm font-semibold">Change Photo</span>
                                    </div>
                                </div>

                                <label class="cursor-pointer">
                                    <div
                                        class="bg-brand-orange text-white px-6 py-3 rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-semibold">Upload Photo</span>
                                    </div>
                                    <input type="file" name="profile_image" accept="image/*" class="hidden"
                                        onchange="previewImage(event)">
                                </label>

                                @error('profile_image')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                                    First Name *
                                </label>
                                <input type="text" name="first_name" value="{{ old('first_name', $first_name) }}"
                                    placeholder="John" required
                                    class="w-full px-4 py-3 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                                @error('first_name')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                                    Last Name *
                                </label>
                                <input type="text" name="last_name" value="{{ old('last_name', $last_name) }}"
                                    placeholder="Doe" required
                                    class="w-full px-4 py-3 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                                @error('last_name')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Job Title -->
                        <div class="group">
                            <label
                                class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition">
                                Job Title
                            </label>
                            <input type="text" name="job_title" value="{{ old('job_title', $job_title) }}"
                                placeholder="Chief Executive Officer"
                                class="w-full px-4 py-3 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                            @error('job_title')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Contact Information -->
                        <div class="space-y-6">
                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    Email Address *
                                </label>
                                <input type="email" name="email" value="{{ old('email', $email) }}"
                                    placeholder="john@company.com" required
                                    class="w-full px-4 py-3 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="group">
                                <label
                                    class="block text-sm font-semibold text-brand-black mb-2 group-focus-within:text-brand-orange transition flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    Mobile Number
                                </label>
                                <input type="tel" name="mobile_number"
                                    value="{{ old('mobile_number', $mobile_number) }}" placeholder="07xxxxxxxx"
                                    class="w-full px-4 py-3 border-2 border-brand-light rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition bg-gray-50 focus:bg-white">
                                @error('mobile_number')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-brand-orange to-red-500 text-white font-bold py-4 rounded-xl hover:shadow-2xl hover:scale-105 transition-all duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Save Changes</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Preview Card -->
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="bg-gradient-to-br from-brand-black to-gray-900 rounded-2xl p-6 shadow-2xl">
                        <h3 class="text-white font-bold text-lg mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Live Preview
                        </h3>

                        <!-- Card Preview -->
                        <div class="bg-white rounded-xl p-6 text-center">
                            <div class="flex justify-center mb-4">
                                <div
                                    class="w-24 h-24 rounded-full bg-brand-orange border-4 border-brand-orange overflow-hidden flex items-center justify-center">
                                    <img id="previewImg" src="{{ $current_image ? asset($current_image) : '#' }}"
                                        alt="Preview"
                                        class="w-full h-full object-cover {{ $current_image ? '' : 'hidden' }}">

                                    <div id="previewInitials"
                                        class="w-full h-full bg-gradient-to-br from-brand-orange to-red-500 flex items-center justify-center text-white text-3xl font-bold {{ $current_image ? 'hidden' : '' }}">
                                        {{ substr($first_name ?: 'U', 0, 1) }}
                                    </div>
                                </div>
                            </div>

                            <h4 class="text-xl font-bold text-brand-black mb-1">
                                {{ $first_name ?: 'First' }} {{ $last_name ?: 'Last' }}
                            </h4>

                            @if($job_title)
                                <p class="text-brand-gray mb-4">{{ $job_title }}</p>
                            @else
                                <p class="text-brand-gray/50 mb-4 italic">Your Job Title</p>
                            @endif

                            <div class="space-y-2 text-sm">
                                @if($email)
                                    <div class="flex items-center justify-center text-brand-gray">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                        {{ $email }}
                                    </div>
                                @endif

                                @if($mobile_number)
                                    <div class="flex items-center justify-center text-brand-gray">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        {{ $mobile_number }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyCardUrl() {
            const url = document.getElementById('cardUrl').textContent.trim();
            const btn = document.getElementById('copyBtnText');

            navigator.clipboard.writeText(url).then(() => {
                btn.textContent = 'Copied!';
                btn.parentElement.classList.add('bg-green-500');
                btn.parentElement.classList.remove('bg-white', 'text-blue-600');
                btn.parentElement.classList.add('text-white');

                setTimeout(() => {
                    btn.textContent = 'Copy';
                    btn.parentElement.classList.remove('bg-green-500', 'text-white');
                    btn.parentElement.classList.add('bg-white', 'text-blue-600');
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy:', err);
                alert('Failed to copy URL');
            });
        }

        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Update Form Image
                    const formImg = document.getElementById('formProfileImage');
                    const formInitials = document.getElementById('formProfileInitials');
                    if (formImg) {
                        formImg.src = e.target.result;
                        formImg.classList.remove('hidden');
                    }
                    if (formInitials) {
                        formInitials.classList.add('hidden');
                    }

                    // Update Preview Image
                    const previewImg = document.getElementById('previewImg');
                    const previewInitials = document.getElementById('previewInitials');
                    if (previewImg) {
                        previewImg.src = e.target.result;
                        previewImg.classList.remove('hidden');
                    }
                    if (previewInitials) {
                        previewInitials.classList.add('hidden');
                    }
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>