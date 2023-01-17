@extends('layouts.master')
@section('content')
    <div class="container">
        <div>
            @if (\Session::has('success'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{route('transaction-store')}}" method="post" id="form1">
            @csrf
            <div class="form-group">
                <label for="date">Enter Date Please</label>
                <input type="date" class="form-control" id="date" aria-describedby="emailHelp" name = "date">
            </div>
            <fieldset id="buildyourform">
            </fieldset>
            <div class="d-flex justify-content-end m-5">
                <input type="button" value="Add a field" class="add btn btn-success " id="add"/>
            </div>
            <div class="d-flex justify-content-end m-5">
            <button class="btn btn-info w-100" type="submit" form="form1" value="Submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            var count =0;
            $("#add").click(function () {

                var lastField = $("#buildyourform div:last");
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = '<div class ="container ">'+
                    '<div class="row"> ' +
                 '<div class="col-3 bg-faded"> ' +
                    '<label for="client_name">Choose from list name Please</label> ' +
                    '<select  class="form-select "   name="client_name[]> ' +
                    '<option value="0"> </option>'+
                     @foreach($clients as $client)
                     '<option value="{{ $client->number }}">  {{ $client->name }} </option>'+
                    @endforeach
                    '</select>'+
                        '</div>'+
                    '<div class="col-3 bg-faded">'+

                 '<div class="form-group">'+
                    '<label for="credit">Enter The Debit Balance Please</label>'+
                    ' <input type="text" class="form-control" id="credit" name="debit_balance[]"'+ (count== 0 ? 'disabled': '')+'>'+
                    '</div>'+

                    '</div>'+
                    '<div class="col-3 bg-faded">'+
                 '<div class="form-group">'+
                    ' <label for="debit">Enter The Credit Balance Please</label>'+
                    '  <input type="text" class="form-control" id="name" name="credit_balance[]" '+ (count!= 0 ? 'disabled': '')+'>'+
                    '</div>'+
                    ' </div>'+
                    ' </div>'+
                    ' <input type=\"button\" onclick="removeFunction(this)" class=\"remove btn-warning\" value=\"-\" /></div>';
                 count++;
               // fieldWrapper.append(removeButton);
                $("#buildyourform").append(fieldWrapper);
            });
        });
        function removeFunction(e){
            console.log(1);
            $(e).parent().remove();
        }
    </script>
@endsection
