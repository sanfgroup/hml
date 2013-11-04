@include("site.layouts.header")
    <div class="container_all">
        @if(Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>
        @endif
        @yield("content")
    </div>
@include("site.layouts.footer");