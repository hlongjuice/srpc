@extends('layouts.master')
@section('content')
    <table class="table table-striped">
        <tr class="info">
            {!! Form::open(array('route'=>array('products.destroy','10'))) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            <th>{!! Form::checkbox('check_product','',null,array('id'=>'select_all')) !!}</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาทุน</th>
            <th>ราคาขาย</th>
            <th>รูป</th>
            <th> </th>
            <th> </th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td width="10%">{!! Form::checkbox('checkbox[]',$product->id,null,array('class'=>'checkbox1')) !!}</td>
                <td width="10%">{{$product->id }}</td>
                <td>{{$product->name }}</td>
                <td>{{$product->cost_price}}</td>
                <td>{{$product->sale_price}}</td>
                {{--Check Image File--}}
                @if(!empty($product->image))
                     <td><img src="{{$product->image}}" height="50" width="50"></td>
                @else
                    <td> </td>
                @endif
                {{--End Check Image File--}}
                <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">แก้ไข</a></td>
                {{--{!! Form::open(array('route'=>array('products.destroy',$product->id),'class' =>'form-horizontal')) !!}--}}
                {{--{{ Form::hidden('_method', 'DELETE') }}--}}
                <td>{{ Form::button('ลบ',array('type'=>'submit','class'=>'btn btn-danger')) }}</td>
                {{--{!! Form::close() !!}--}}
            </tr>
        @endforeach
        <tr><td>{{ Form::submit('ลบทั้งหมด',array('class'=>'btn btn-danger','name'=>'delete_all'))}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        {!! Form::close() !!}
    </table>
@endsection
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