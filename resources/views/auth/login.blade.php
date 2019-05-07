<html>
<body>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="/login">

    <input type="text" name="email" placeholder="email" size="40"><br><br>
    <input type="password" name="password" placeholder="password" size="40"><br><br>
    <input hidden name="_token" value="{{csrf_token()}}">
    <input type="submit" value="send">
</form>


</body>
</html>