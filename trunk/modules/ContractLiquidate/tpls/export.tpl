<form id="AppendixContract" name="AppendixContract" method="post" action="">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:2px">
    <tr>
      <td align="center"><p>CTY TNHH MTV DV DL LỄ HỘI </p>
      <p>( CARNIVAL CO.)</p>
      <p>--oOo--</p></td>
      <td align="center"><p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
      <p>Độc Lập - Tự Do - Hạnh Phúc</p>
      <p>----------------------------</p></td>
    </tr>
    <br />
    <tr>
      <td colspan="2" align="center"><strong>{LBL_TITLE_THANH_LY}</strong></td>
    </tr>
  </table>
  <br />
  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabForm">
    
    <tr>
        <td class="dataLabel" style="text-align: inherit;" colspan="4">
             Hôm nay, ngày {DAY} tháng {MONTH} năm {YEAR} chúng tôi gồm :
         </td>
    </tr>
    <br />
    <tr>
        <td class="dataLabel"><u><b>{LBL_BEN_A}:</b></u></td>
        <td class="dataLabel"><b>{LBL_COM_NAME}</b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_BEN_A_NAME}</td>
        <td class="dataField">{DAIDIENBENA}</td>
        <td class="dataLabel">{LBL_POSITION}</td>
        <td class="dataField">{position_a}</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_ADDRESS}</td>
        <td class="dataField">{address_a}</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataField">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_PHONE}</td>
        <td class="dataField">{phone_a}</td>
        <td class="dataLabel">{LBL_FAX}</td>
        <td class="dataField">{fax_a}</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_TAX}</td>
        <td class="dataField">{mst_bena}</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel"><b><u>{LBL_BEN_B}</u></b></td>
        <td class="dataField">{BENB}</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_BEN_B_NAME}</td>
        <td class="dataField">{DAIDIENBENB}</td>
        <td class="dataLabel">{LBL_POSITION}</td>
        <td class="dataField">{position_b}</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_ADDRESS}</td>
        <td class="dataField">{address_b}</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataField">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_PHONE}</td>
        <td class="dataField">{phone_b}</td>
        <td class="dataLabel">{LBL_FAX}</td>
        <td class="dataField">{fax_b}</td>
    </tr>
    <tr>
        <td class="dataLabel">{LBL_TAX}</td>
        <td class="dataField">{mst_benb}</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <br />
    <tr>
        <td colspan="4" class="dataLabel">{LBL_NOIDUNG_THANH_LY}:</td>
    </tr>
    <br />
    <tr>
        <td class="dataField" colspan="4" valign="top">
            <table cellpadding="0" cellspacing="0" border="1">


                <tr align="center">
                    <td rowspan="2"><b>{LBL_NOIDUNG}</b></td>
                    <td colspan="3"><b>{LBL_KEHOACH}</b></td>
                    <td colspan="3"><b>{LBL_THUCTE}</b></td>
                </tr>
                <tr align="center">
                    <td><b>{LBL_DONGIA}</b></td>
                    <td><b>{LBL_SL}</b></td>
                    <td><b>{LBL_THANHTIEN}</b></td>
                    <td><b>{LBL_DONGIA}</b></td>
                    <td><b>{LBL_SL}</b></td>
                    <td><b>{LBL_THANHTIEN}</b></td>
                </tr>
                <tr>
                <td class="td_content" id="amount" colspan="7"><b>I/{LBL_TONGGIATRIHD}</b></td>


                </tr>
                 {GIATRIHOPDONG}
                <tr>
                <td><b>{LBL_TONGCONG}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGCONG_CONTRACT_KEHOACH}</p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGCONG_CONTRACT_THUCTE}</p></td> 

                </tr>
                <tr>
                <td colspan="7"><b>II/{LBL_CHIPHIPHATSINHTANG}</b></td>

                </tr>
                {PHATSINHTANG}
                <tr>
                <td><b>{LBL_TONGCONG}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>    
                <td><p align="right">{TONGCONG_TANG_KEHOACH}</p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGCONG_TANG_THUCTE}</p></td>

                </tr>
                <tr>
                <td colspan="7"><b>III/{LBL_CHIPHIPHATSINHGIAM}</b></td>


                </tr>
                {PHATSINHGIAM} 
                <tr>
                <td><b>{LBL_TONGCONG}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGCONG_GIAM_KEHOACH}</p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGCONG_GIAM_THUCTE}</p></td> 

                </tr>
                <tr>
                <td><b>{LBL_TONGTRIGIATOUR}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGTIEN_KEHOACH}</p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TONGTIEN_THUCTE}</p></td> 

                </tr>
                <tr>
                <td><b>III/{LBL_BENBTHANHTOANBENA}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TIENTHANHTOAN}</p></td> 

                </tr>

                <tr>
                <td><b>VI/{LBL_BENBNOBENA}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TIENCONLAI}</p></td>  
                </tr>


                <tr>
                <td><b>VI/{LBL_BENANOBENB}</b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p align="right">{TIENTRALAI}</p></td>
                </tr>

                <tr>
                    <td colspan="8" align="center">{LBL_BANGCHU} : &nbsp;{BANGCHU}&nbsp;USD </td>
                </tr>
            </table>
        </td>                                                                                                        
    </tr>
 <br />
    <tr>
        <td colspan="2" class="dataField" align="center"><br/><b>{LBL_DAIDIENBENA}</b><br/><br/><br/>
            <label>{DAIDIENBENA}</label>
        </td>
        <td colspan="2" class="dataField" align="center"><br/><b>{LBL_DAIDIENBENB}</b><br/><br/><br/>
            <label>{DAIDIENBENB}</label>
        </td>
    </tr>
  </table>
</form>
