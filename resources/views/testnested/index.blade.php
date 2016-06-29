@extends('layouts.master')
@section('content')
    <a class="btn btn-default" href={{route('testnested.create')}}>เพิ่มหมวดหมู่</a>
    <ul>
        @foreach($nested as $node)
            <?php echo renderNode($node); ?>
        @endforeach
    </ul>
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