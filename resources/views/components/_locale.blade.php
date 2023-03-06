<form action="{{ route('set.language.locale', $lang) }}" method="POST">
    @csrf
    <button class="nav-link ">
        <span class="fib {{ $nation }}"></span>
    </button>
</form> 