@extends('layouts.main')

@section('content')
    <!-- List -->
    <main class=" container mx-auto p-5">
        <div class="space-y-3 mb-5">
            <dl class="flex flex-col sm:flex-row gap-1">
                <dt class="min-w-40">
                    <span class="block text-sm text-gray-500 dark:text-neutral-500">Exchange:</span>
                </dt>
                <dd>
                    <ul>
                        <li>Your amount is {{ $inputAmount }} {{ $fromCurrency }} = {{ $result }}</li>
                    </ul>
                </dd>
            </dl>

            <h3 class=" my-5  text-xl font-bold">Exchange Record</h3>
            <ul class="max-w-xs flex flex-col mb-5">
                @foreach ($records as $record)
                    <li
                        class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border border-gray-200 text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-neutral-900 dark:border-neutral-700 dark:text-white">
                        {{ $record->input }} = {{ $record->output }}
                    </li>
                @endforeach

            </ul>
        </div>
        <a href="{{ route('exchange-calculator') }}"
            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Try next
        </a>
    </main>
    <!-- End List -->
@endsection
