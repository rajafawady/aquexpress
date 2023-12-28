@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="position-fixed fixed-top text-white px-48 py-3 w-50 m-auto text-center border-2 border-white rounded-lg" style="background-color: #352f44;">
  <p>
    {{session('message')}}
  </p>
</div>
@endif