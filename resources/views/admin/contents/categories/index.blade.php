@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            หมวดหมู่
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-4">
                <a class="btn btn-default" href={{route('admin.categories.create')}}>เพิ่มหมวดหมู่</a>
            </div>
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หมวดหมู่</th>
                            <th>เลเวล</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $row =1?>
                    @foreach($categories as $category)
                            <tr>
                                <td>{{$row}}</td>
                                <td>
                                    <ul>
                                        <?php echo renderNode($category)?>
                                    </ul>

                                </td>
                                <td>{{$category->level}}</td>

                            </tr>
                            <?php $row++?>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection


<?php
function renderNode($node) {
    if( $node->isLeaf() ) {
        return '<li>' . $node->title . '</li>';
    } else {
        $html = '<li>' . $node->title;

        $html .= '<ul>';

        foreach($node->children as $child)
            $html .= renderNode($child);

        $html .= '</ul>';

        $html .= '</li>';
    }

    return $html;
}
?>