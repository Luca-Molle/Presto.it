<form action="{{ route('set.language.locale', $lang) }}" method="POST">
    @csrf
    <button class="nav-link">
        <span class="flag-icons flag-icon-{{ $nation }}"></span>
    </button>
</form>