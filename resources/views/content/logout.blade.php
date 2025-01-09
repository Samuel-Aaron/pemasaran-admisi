<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

@auth
    user
@endauth