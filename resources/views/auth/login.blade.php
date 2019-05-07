<html>
<body>
<form method="post" action="login">

    <input type="email" name="email" placeholder="email" size="40"><br><br>
    <input type="password" name="password" placeholder="password" size="40"><br><br>
    <input hidden name="_token" value="{{csrf_token()}}">
    <input type="submit" value="send">
</form>
</body>
</html>