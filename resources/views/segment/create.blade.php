@extends('layouts.master')
@section('content')


    <div class="row">
        <div class="col-sm-10 offset-sm-1 mt-4">

            <form>
                <div class="card">
                    <h5 class="card-header text-secondary">Segment Create</h5>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="segment_name" class="col-sm-2 col-form-label">Segment Name.</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="segment_name" id="segment_name" placeholder="Enter Segment Name.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Segment Logic</label>
                            <div class="col-sm-10" id="segment_logic">
                                <input type="hidden" name="batch[]">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control form-control-sm" name="logic[1][]" id="logic_field_1" onchange="getOperator(1)">
                                            <option value="">- Logic Field -</option>

                                            @foreach(config('app.logic_field') as $logic_field)

                                                <option value="{{ $logic_field }}">{{ $logic_field }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control form-control-sm" name="operator[1][]" id="text_operator_1" onchange="getTextValue(1)">
                                            <option value="">- Operator -</option>

                                            @foreach(config('app.text_type') as $text_type)

                                                <option value="{{ $text_type }}">{{ $text_type }}</option>

                                            @endforeach

                                        </select>
                                        <select class="form-control form-control-sm" name="operator[1][]" id="date_operator_1" onchange="getDateValue(1)" hidden>
                                            <option value="">- Operator -</option>

                                            @foreach(config('app.date_type') as $date_type)

                                                <option value="{{ $date_type }}">{{ $date_type }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="input_1">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control form-control-sm " name="text_value[1][]">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="date_to_date_1" hidden>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-sm date-picker" name="from_date[1][]">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-sm date-picker" name="to_date[1][]">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="date_1" hidden>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control form-control-sm date-picker" name="date[1][]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-right">
                                        <button class="btn btn-sm remove" disabled type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-sm btn-primary addOr" type="button"><i class="fa fa-plus"></i> Or</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-sm-2 offset-sm-2">
                                <button class="btn btn-sm btn-primary addAnd" type="button"><i class="fa fa-plus"></i> And</button>
                            </div>
                        </div>


                        <div class="form-group row mt-5">
                            <div class="col-sm-12">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
                                <a href="" class="btn btn-sm btn-outline-secondary"> Cancel</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>


@endsection

@push('js')

    <script>

        var i = 2;
        $(".addOr").on("click", function (){
            var newRow = $('<div class="row remove_row mt-3">');
            var cols = "";
            cols += '<div class="col-sm-4">\n' +
                '                                   <select class="form-control form-control-sm" id="logic_field_'+i+'" name="logic['+i+'][]" onchange="getOperator('+i+')">\n' +
                '                                            <option value="">- Logic Field -</option>\n' +
                '\n' +
                '                                            @foreach(config('app.logic_field') as $logic_field)\n' +
                '\n' +
                '                                                <option value="{{ $logic_field }}">{{ $logic_field }}</option>\n' +
                '\n' +
                '                                            @endforeach\n' +
                '\n' +
                '                                        </select>' +
                '                                    </div>';
            cols += '<div class="col-sm-3">\n' +
                '                                        <select class="form-control form-control-sm" id="text_operator_'+i+'" name="operator['+i+'][]" onchange="getTextValue('+i+')">\n' +
                '                                            <option value="">- Operator -</option>\n' +
                '\n' +
                '                                            @foreach(config('app.text_type') as $text_type)\n' +
                '\n' +
                '                                                <option value="{{ $text_type }}">{{ $text_type }}</option>\n' +
                '\n' +
                '                                            @endforeach\n' +
                '\n' +
                '                                        </select>\n' +
                '                                        <select class="form-control form-control-sm" id="date_operator_'+i+'" name="operator['+i+'][]" onchange="getDateValue('+i+')" hidden>\n' +
                '                                            <option value="">- Operator -</option>\n' +
                '\n' +
                '                                            @foreach(config('app.date_type') as $date_type)\n' +
                '\n' +
                '                                                <option value="{{ $date_type }}">{{ $date_type }}</option>\n' +
                '\n' +
                '                                            @endforeach\n' +
                '\n' +
                '                                        </select>\n' +
                '                                    </div>';
            cols += '<div class="col-sm-4">\n' +
                '                                        <div id="input_'+i+'">\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-sm-12">\n' +
                '                                                    <input type="text" class="form-control form-control-sm " name="text_value['+i+'][]">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div id="date_to_date_'+i+'" hidden>\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-sm-6">\n' +
                '                                                    <input type="text" class="form-control form-control-sm date-picker" name="from_date['+i+'][]">\n' +
                '                                                </div>\n' +
                '                                                <div class="col-sm-6">\n' +
                '                                                    <input type="text" class="form-control form-control-sm date-picker" name="to_date['+i+'][]">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div id="date_'+i+'" hidden>\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-sm-12">\n' +
                '                                                    <input type="text" class="form-control form-control-sm date-picker" name="date['+i+'][]">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';
            cols += ' <div class="col-sm-1 text-right">\n' +
                '                                        <button class="btn btn-sm remove" type="button"><i class="fa fa-trash"></i></button>\n' +
                '                                    </div>';
            newRow.append(cols);
            $("#segment_logic").append(newRow);

            i++;

            $('.date-picker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });
        });


        var i = 2;
        $(".addAnd").on("click", function (){
            var newRow = $('<input type="hidden" name="batch[]"><div class="row mt-5 repeate_row">');
            var cols = "";
            cols += '<div class="col-sm-4">\n' +
                '                                   <select class="form-control form-control-sm" id="logic_field_'+i+'" onchange="getOperator('+i+')">\n' +
                '                                            <option value="">- Logic Field -</option>\n' +
                '\n' +
                '                                            @foreach(config('app.logic_field') as $logic_field)\n' +
                '\n' +
                '                                                <option value="{{ $logic_field }}">{{ $logic_field }}</option>\n' +
                '\n' +
                '                                            @endforeach\n' +
                '\n' +
                '                                        </select>' +
                '                                    </div>';
            cols += '<div class="col-sm-3">\n' +
                '                                        <select class="form-control form-control-sm" id="text_operator_'+i+'" onchange="getTextValue('+i+')">\n' +
                '                                            <option value="">- Operator -</option>\n' +
                '\n' +
                '                                            @foreach(config('app.text_type') as $text_type)\n' +
                '\n' +
                '                                                <option value="{{ $text_type }}">{{ $text_type }}</option>\n' +
                '\n' +
                '                                            @endforeach\n' +
                '\n' +
                '                                        </select>\n' +
                '                                        <select class="form-control form-control-sm" id="date_operator_'+i+'" onchange="getDateValue('+i+')" hidden>\n' +
                '                                            <option value="">- Operator -</option>\n' +
                '\n' +
                '                                            @foreach(config('app.date_type') as $date_type)\n' +
                '\n' +
                '                                                <option value="{{ $date_type }}">{{ $date_type }}</option>\n' +
                '\n' +
                '                                            @endforeach\n' +
                '\n' +
                '                                        </select>\n' +
                '                                    </div>';
            cols += '<div class="col-sm-4">\n' +
                '                                        <div id="input_'+i+'">\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-sm-12">\n' +
                '                                                    <input type="text" class="form-control form-control-sm ">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div id="date_to_date_'+i+'" hidden>\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-sm-6">\n' +
                '                                                    <input type="text" class="form-control form-control-sm date-picker">\n' +
                '                                                </div>\n' +
                '                                                <div class="col-sm-6">\n' +
                '                                                    <input type="text" class="form-control form-control-sm date-picker">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        <div id="date_'+i+'" hidden>\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-sm-12">\n' +
                '                                                    <input type="text" class="form-control form-control-sm date-picker">\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';
            cols += ' <div class="col-sm-1 text-right">\n' +
                '                                        <button class="btn btn-sm remove" type="button"><i class="fa fa-trash"></i></button>\n' +
                '                                    </div>';
            newRow.append(cols);
            i++;

            $("#segment_logic").append(newRow);

            $('.date-picker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });
        });

        function getOperator(id)
        {
            var logicField = $("#logic_field_"+id).val();

            if (logicField == "created_at" || logicField == "birth_day")
            {
                $("#text_operator_"+id).attr("hidden",true);
                $("#date_operator_"+id).attr("hidden",false);

                alert(logicField)
            }
            else {

                $("#text_operator_"+id).attr("hidden",false);
                $("#date_operator_"+id).attr("hidden",true);
                alert(logicField)
            }
        }

        function getTextValue(id)
        {
            $("#input_"+id).attr("hidden", false);
            $("#date_to_date_"+id).attr("hidden", true);
            $("#date_"+id).attr("hidden", true);
        }

        function getDateValue(id)
        {
            var date_operator = $("#date_operator_"+id).val();

            if (date_operator == "between")
            {
                $("#input_"+id).attr("hidden", true);
                $("#date_"+id).attr("hidden", true);
                $("#date_to_date_"+id).attr("hidden", false);

            }else {

                $("#input_"+id).attr("hidden", true);
                $("#date_to_date_"+id).attr("hidden", true);
                $("#date_"+id).attr("hidden", false);

            }

        }



        $("#segment_logic").on("click", ".remove", function (element){
            $(this).closest(".row").remove();
        });

        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });


    </script>

@endpush
