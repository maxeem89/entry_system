@extends('layouts.master')
@section('content')
    <div class="container my-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Number</th>
                <th scope="col">Debit Balance </th>
                <th scope="col">Credit Balance </th>
                <th scope="col">Created At </th>

            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <th scope="row">{{$transaction->id}}</th>
                    <td>{{$transaction->name}}</td>
                    <td>0{{$transaction->number}}</td>
                    <td>{{number_format($transaction->debit_balance, 2)}}</td>
                    <td>{{number_format($transaction->credit_balance, 2)}}</td>
                    <td>{{$transaction->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
