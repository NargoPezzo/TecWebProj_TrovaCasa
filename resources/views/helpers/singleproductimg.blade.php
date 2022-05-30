@php
        if (empty($imgFile)) {
            $imgFile = 'no_home_icon.jpg';
        }
        if (null !== $attrs) {
            $attrs = 'class="' . $attrs . '"';
        }

@endphp
<div style="width:600px;height:600px;overflow:hidden">
    <img src="{{ asset('images/products/' . $imgFile) }}" {!! $attrs !!}>
    </div>
