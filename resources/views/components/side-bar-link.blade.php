<li class="list-group-item {{$link== request()->url()? 'active':''}}" aria-current="true">
    <a href="{{$link}}">
        <i class="{{$icon}} me-auto">
        </i>
        {{$name}}
    </a>
</li>
