<!DOCTYPE html>
<html>
<head>
<meta charset = “utf-8”><title>cookie</title>
<script type = "text/JavaScript">

var today = new Date();
var expiresDate = new Date( today.getTime() + (30000));
document.cookie = name + "="  + "Guests" +
"; expires =" + expiresDate.toGMTString();

</script>
</head>
<body>
<h1>Bake A Cookie</h1>


</body>
</html>
