@if("$show")

    <div class=" label">
        <span class="label-text @error("$name") text-error @enderror ">{{$label}}</span>
    </div>
@endif

<input type={{$type}} name={{$name}} value="{{ $default? old("$name",$default) :old("$name") }}"
       class="w-full @if($type!=='file')  input input-bordered @else file-input file-input-bordered  @endif bg-white  join-item @error("$name")input-error
                            @enderror"
       placeholder="Create Category"/>
@error("$name")
<div class="label">
    <span class="label-text-alt text-error">{{ $message }}</span>
</div>
@enderror
