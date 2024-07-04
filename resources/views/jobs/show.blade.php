<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <h>{{$job->title}}</h>
    <p>This is paying {{$job->salary}}</p>
    <x-button href="/jobs/{{$job->id}}/edit" class="mt-5">Edit Job</x-button>

</x-layout>
