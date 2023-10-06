@extends('layout')
@section('content')


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.2.0/css/scroller.dataTables.min.css">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>ZIP / Post code</th>
            <th>Country</th>
        </tr>
        </thead>
    </table>

    @include('scripts.table')
@endsection

