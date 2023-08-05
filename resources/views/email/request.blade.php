<!DOCTYPE html>
<html>
<head>
    <title>Carpooling</title>
</head>
<body>
    <h3>{{ $details['title'] }}</h3>
     Dear Manager,
    <p>Sehubungan dengan adanya permohonan pemakaian mobil di aplikasi CARPOOLING 
      mohon untuk melakukan <p> Klik =><a href ="{{ url('carrequest/approveemail/') }}/{{ $details['url'] }}/ap/{{ $details['reqid'] }}"> SETUJU </a> untuk menyetujui 
     <p> Atau <p> Klik => <a href ="{{ url('carrequest/approveemail/') }}/{{ $details['url'] }}/tl/{{ $details['reqid'] }}"> TOLAK </a> untuk menolak.</p>
      
      <table>
            <tr>
            <td>Req ID</td>
            <td>:</td>
            <td>{{ $details['reqid'] }}</td>
         </tr>
         <tr>
            <td>Nama </td>
            <td>:</td>
            <td>{{ $details['nama'] }}</td>
         </tr>
         <tr>
            <td>Tujuan </td>
            <td>:</td>
            <td>{{  $details['tujuan'] }}</td>
         </tr>
         <tr>
            <td>Jumlah Penumpang </td>
            <td>:</td>
            <td>{{ $details['jumlah'] }}</td>
         </tr>    

         <tr>
            <td>Aditional Info </td>
            <td>:</td>
            <td>{{ $details['addinfo'] }}</td>
         </tr>

       
     </table> 

   
    <p>Thank you</p>
</body>
</html>