@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="position-fixed fixed-top bg-primary text-white px-48 py-3 w-50 m-auto text-center">
  <p>
    {{session('message')}}
  </p>
</div>
@endif