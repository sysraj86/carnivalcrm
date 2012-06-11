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
    border-style: inherit;
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

       
        <table border="1">
        <tr>
        <td colspan="7" style="text-align: left;">
            FROM :   {FROM}      <br>
            CHUYEN BAY 1 :   {CHUYENBAY1}   <br>
            TIME :         {TIME1}            <br>
            CHUYEN BAY 2 :   {CHUYENBAY2}     <br>
            TIME :           {TIME2}          <br>
        </td>
        </tr>  
        <tr>
            <td>
                STT
            </td>
            <td>
                NAME
            </td>
            <td>
                SEX
            </td>
            <td>
                MA CHUYEN BAY 1
            </td>
            <td>
                SO VE
            </td>
            <td>
                MA CHUYEN BAY 2
            </td>
            <td>
                SO VE
            </td>
        </tr>
        {FIT_RECORE}
        </table>

</body>
</html>