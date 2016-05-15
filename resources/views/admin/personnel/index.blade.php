@extends('layouts.master')
@section('nav')
    @include('coop_division.layouts.navbar')
    @endsection
@section('content')
    <div class="panel panel-default">
         <div class="panel-heading"><h4>บุคคลากร</h4></div>
        <div class="panel-body">
            <div class="row" id="add-personnel-btn">
                <div class="col-xs-6 col-md-4">
                    <a class="btn btn-default" href={{route('admin.personnel.create')}}>เพิ่มบุคคลากร</a>
                </div>
            </div>
            <div class="row">
                @foreach($personnel as $person)

                        <div class="col-xs-6 col-md-4">
                            <div class="thumbnail">
                            @if(!empty($person->image))
                                    <img src={{$person->image}}>
                            @else
                                    <img class="img-responsive " style="width: 100%" src="http://placehold.it/200x200">
                            @endif

                                <div class="caption text-center">
                                    <p>{{$person->name." ".$person->lastname}}</p>

                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

{{--Side Menu--}}
@section('sidemenu')
    @include('coop_division.layouts.sidemenu')
    @endsection
{{--Script--}}
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#select_all').click(function(event) {  //on click
                if(this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"
                    });
                }else{
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"
                    });
                }
            });

        });
    </script>
@endsection