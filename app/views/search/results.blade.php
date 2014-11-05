@extends('layouts/default')


@section('styles')
@parent

<link rel="stylesheet" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.css"/>

@stop

@section('scripts')
@parent

<script type="text/javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(function() {

        $('#results-table').DataTable();
    });
</script>

@stop


@section('content')

<table id="results-table" class="table table-striped">
    <thead>
        <tr>
            <th>County</th>
            <th>V</th>
            <th>P#</th>
            <th>I#</th>
            <th>Grantors</th>
            <th>Grantees</th>
            <th>Survey</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($results as $result)

        <tr>
            <td>{{ $result['cwlvcda:county'] }}</td>
            <td>{{ $result['cwlvcda:volume'] }}</td>
            <td>{{ $result['cwlvcda:page'] }}</td>
            <td>{{ $result['cwlvcda:instrumentNumber'] }}</td>
            <td>{{ implode('<br />', $result['cwlvcda:grantor']) }}</td>
            <td>{{ implode('<br />', $result['cwlvcda:grantee']) }}</td>
            <td>{{ $result['cwlvcda:survey'] }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

@stop