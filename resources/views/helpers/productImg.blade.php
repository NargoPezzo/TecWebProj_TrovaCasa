@php
        if (empty($imgFile)) {
            $imgFile = 'no_home_icon.jpg';
        }
        if (null !== $attrs) {
            $attrs = 'class="' . $attrs . '"';
        }

@endphp
<div style="width:300px;height:250px;overflow:hidden">
    <img src="{{ asset('images/products/' . $imgFile) }}" style="height:100%" {!! $attrs !!}>
    </div>