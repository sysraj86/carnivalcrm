<html>
<head>
<title></title>
<style>
    TD {    
    border-style: solid;
    border-color: black;
    text-align: center;
    border-width: 1px;
}
TABLE {
    width: auto;
    border-style: solid;
    border-color: black;
    text-align: center;
    border-width: 1px;
}
 H1,H2 {
   text-align: center;  
     
 }
 BODY{
     text-align: center;
 }

</style>
</head>
<body>
<h1>{TITLE}</h1>
<h2>Từ ngày {NGAYBATDAU}  đến ngày {NGAYKETTHUC}</h2>

        
    <table>
        <tr>
            <td colspan="7"><h2>Cá Nhân</h2></td>
        </tr> 
        <tr>
            <td>STT</td>
            <td>GT</td>
            <td>HỌ TÊN</td>
            <td>NGÀY SINH</td>
            <td>SỐ HỘ CHIẾU</td>
            <td>MỨC BH</td>
            <td>NGÀY KHỞI HÀNH</td>
        </tr>
        {CANHAN}
        <tr>
            <td colspan="7"><h2>Gia Đình</h2></td>
        </tr>
        {GIADINH}
    </table>
</body>
</html>