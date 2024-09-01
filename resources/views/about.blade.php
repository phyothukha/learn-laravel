@extends('layouts.main')



@section('content')
    <div>
        <h1 class=" text-red-700 text-3xl">Hello ABout</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione obcaecati voluptatum eveniet accusantium
            deleniti error quisquam perferendis reprehenderit nam laudantium vero sed, libero, repellendus fuga magnam
            aliquam doloremque sapiente vel.</p>
    </div>
@endsection



@prepend('script')
    <script>
        console.log("hello world one")
    </script>
@endprepend

{{-- @push('script')

<script>
    alert("hello about")
</script>

@endpush --}}
