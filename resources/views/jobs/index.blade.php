<x-layout>
    <x-slot:heading>Jobs Listing</x-slot:heading>

    <div class="space-y-4">
    @foreach($jobs as $job)

            <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">
                   <strong> {{$job->employer->name}}</strong>
                </div>
                <div><strong> {{$job['title']}}</strong> pays {{$job['salary']}} per year.</div>
            </a>



    @endforeach
        <di>
            {{$jobs->links()}}
        </di>
    </div>

</x-layout>
