@extends('layouts.master')
@section('content')
    <div class="container my-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Number</th>
                <th scope="col">Name</th>
                <th scope="col">Debit Balance </th>
                <th scope="col">Credit Balance </th>
                <th scope="col">Created At </th>

            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>0{{$client->number}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{number_format($client->debit_balance, 2)}}</td>
                    <td>{{number_format($client->credit_balance, 2)}}</td>
                    <td>{{$client->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
