<x-layout>
    <h1>Schedule an Appointment</h1>

    @if ($errors->any())
    <div class="error-box" id="errorBox">
        @foreach ($errors->all() as $error)
        <div> - {{ $error }}</div>
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf

        <label for="name">Enter Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">

        <label for="email">Enter Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">

        <label for="phone_number">Enter Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">

        <label for="service_type">Select Service Type</label>
        <select name="service_type" id="service_type">
            <option value="" disabled {{ old('service_type') == '' ? 'selected' : '' }}>Select Service</option>
            <option value="Ventilation" {{ old('service_type') == 'Ventilation' ? 'selected' : '' }}>Ventilation</option>
            <option value="Aircon" {{ old('service_type') == 'Aircon' ? 'selected' : '' }}>Aircon</option>
            <option value="Solarpower" {{ old('service_type') == 'Solarpower' ? 'selected' : '' }}>Solarpower</option>
        </select>

        <label for="location">Select Location</label>
        <select name="location" id="location">
            <option value="" disabled {{ old('location') == '' ? 'selected' : '' }}>Select Location</option>
            <option value="Sta. Rosa City" {{ old('location') == 'Sta. Rosa City' ? 'selected' : '' }}>Sta. Rosa City</option>
            <option value="Cabuyao City" {{ old('location') == 'Cabuyao City' ? 'selected' : '' }}>Cabuyao City</option>
            <option value="Calamba City" {{ old('location') == 'Calamba City' ? 'selected' : '' }}>Calamba City</option>
        </select>

        <label for="warranty">Select Warranty</label>
        <select name="warranty" id="warranty">
            <option value="" disabled {{ old('warranty') == '' ? 'selected' : '' }}>Select Warranty</option>
            <option value="With warranty" {{ old('warranty') == 'With warranty' ? 'selected' : '' }}>With warranty</option>
            <option value="No warranty" {{ old('warranty') == 'No warranty' ? 'selected' : '' }}>No warranty</option>
        </select>

        <label for="message">Enter Your Message</label>
        <textarea name="message" id="message" rows="4">{{ old('message') }}</textarea>

        <button>Save</button>
    </form>

</x-layout>

<style>
    .error-box {
        position: absolute;
        right: 0;
        margin-right: 3rem;
        display: flex;
        flex-direction: column;
        height: auto;
        padding: 10px;
        background-color: #f8d7da;
        /* Light red for error display */
        color: #721c24;

        opacity: 0;
        transform: translateX(100%);
        /* Start off-screen */
        transition: all 0.5s ease-in-out;
        /* Smooth transition effect */
        border-radius: 10px;
    }

    .error-box.show {
        opacity: 1;
        transform: scale(1);
    }
</style>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const errorBox = document.getElementById('errorBox');
        if (errorBox) {
            setTimeout(() => {
                errorBox.classList.add('show'); // Trigger the slide-in effect
                setTimeout(() => {
                    errorBox.classList.remove('show'); // Trigger slide-out effect
                }, 4000); // Error box stays visible for 4 seconds
            }, 100); // Small delay ensures animation works after DOM load
        }
    });
</script>