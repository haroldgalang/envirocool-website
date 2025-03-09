<x-layout >
<div>
<h1>Appointments</h1>

<a href="{{ route('appointments.create') }}">Create an appointment</a>

@foreach ($appointments as $appointment)
<h1> {{$appointment->name}} </h1>
@endforeach

</div>
</x-layout>

