@extends('layouts.master')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">

        @if (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        <form action="{{route('client-store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="c_name" aria-describedby="emailHelp"
                       placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="name" class="mx-3">choose Category </label>
                <select class="form-select" id="categoryType" aria-label="Default select example"
                        name="type_of_category">
                    <option value="1" selected>main category</option>
                    <option value="2">sub category</option>
                </select>
            </div>
            <div id="childrenAge">
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script>
        $("select#categoryType").on("change", function () {
            var number = parseInt($("#categoryType").val());
            var label = "<label>choose the main category </label>";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (number == 2) {
                $.ajax({
                    type: 'POST',
                    url: '/order-data',
                    data: {
                        'number': number
                    },
                    success: function (data) {


                        console.log(data[0]);
                        var selOpts = `<div><label for='childrenAge'> Choose from list main category </label></div>`;
                        selOpts += `<select class="form-select" id="childrenAge" aria-label="Default select example" name="main_category">`
                        $.each(data[0], function (k, v) {
                            var id = data[0][k].number;
                            var val = data[0][k].name;
                            selOpts += "<option value='" + id + "'>" + val + "</option>";
                        });
                        selOpts += `</select>`;
                        $('#childrenAge').append(selOpts);
                    }
                });
            } else {
                $("#childrenAge").empty();
            }
        });
    </script>
@endsection
