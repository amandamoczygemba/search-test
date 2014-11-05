@extends('layouts/default')

@section('scripts')

{{ HTML::script('assets/js/autogrow.js') }}

<script>
    $(document).ready(function() {
        $("#query").autoGrow();
    });
</script>

@stop

@section('content')

<form id="form-search" name="form-search" method="post" accept-charset="UTF-8" role="form">

    <div class="form-group">
        <label for="query">Query</label>
        <textarea id="query" name="query" class="form-control" rows="10">{{ Input::old('query') }}</textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit Query</button>
    </div>

</form>

@stop