<!DOCTYPE html>
<html>
<head>
    <title>Approval Document</title>
</head>
<body>
    <h3>{{ $details['title'] }}</h3>
     Dear,
    <p>Sehubungan dengan adanya permohonan reset/ganti password account approval document
Klik =><a href ="{{ url('sendemail/show/') }}/{{ $details['url'] }}"> Untuk Rubah Password </a>
        
    <p>Thank you</p>
</body>
</html>