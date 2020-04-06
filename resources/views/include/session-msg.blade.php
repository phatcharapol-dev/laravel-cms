@if (Session::has('message'))
    <div class="{{Session::get('alert-class')}}">
        <p>{{Session::get('message')}}</p>
    </div>
@endif