@props(['sizetagsCsv'])


@php
    $sizetagss = explode(',', $sizetagsCsv);
    $sizetags = array_unique($sizetagss);
@endphp
{{-- Php directive - inside php directive  we can write any php code--}}

<ul class="flex">

    @foreach($sizetags as $stag)
        <div class="form-check pl-0 mb-3 mx-2" style="display: inline-flex">
            <input type="radio" class="form-check-input filled-in" id="{{$stag}}" name="size" class="mx-2">
            <label class="form-check-label small text-uppercase card-link-secondary" for="{{$stag}}" name="size" ><strong> {{$stag}}</strong></label>
          </div>

    @endforeach
</ul>