@include("admin.layouts.header")
<div class="container">
    <div class="row"><h1>{{date('d.m.Y H:i')}}</h1></div>
    @yield("content")
</div>
@include("admin.layouts.footer")