@extends('layouts.main')


<form action="{{ route('exchange-to-mmk') }}" method="POST">
    @csrf
    <main class=" border p-5 max-w-[500px] m-5 rounded-md">
        <h2 class=" text-xl font-bold mb-5">Change Currency</h2>
        <div class="max-w-sm space-y-3">
            <label for="">Currency</label>
            <input type="text"
                class="py-3 px-4 block w-full border border-gray-600 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                name="currency" placeholder="This is placeholder">
        </div>
        <div class="max-w-sm space-y-3">
            <label for="">Amount</label>x
            <input type="text"
                class="py-3 px-4 block w-full border border-gray-600 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                name="amount" placeholder="This is placeholder">
        </div>
        <button type="submit"
            class="py-3 mt-5 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Change
        </button>
    </main>
</form>
