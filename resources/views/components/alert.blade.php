@if(session()->has($input))
      <div class="alert alert-success">
          {{ session()->get($input) }}
      </div>
    @endif

    @if(session()->has($delete))
      <div class="alert alert-success">
          {{ session()->get($delete) }}
      </div>
    @endif

    @if(session()->has($update))
      <div class="alert alert-success">
          {{ session()->get($update) }}
      </div>
@endif