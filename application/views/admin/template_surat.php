<!DOCTYPE html>
<?php
    $drow = $data[0];
?>

<html>
    <head>
        <title>Izin Mengambil Data</title>
        <meta charset="UTF-8">
        <style type = "text/css">
            body{
                margin-top    : 40px;
                margin-right  : 300px;
                margin-bottom : 40px;
                margin-left   : 300px;
                font-family:"cambria";
            }
        </style>
    </head>
    <body onload="window.print()">
        <table width="100%" style="margin-left:20px">
            <tr>
                <td width="50" align="left"><img src="<?php echo base_url('assets/image/index.jpg'); ?>" alt="" width="140" height="130"></td>
                <td width="-100" align="left" >
                    <h3 style="line-height: 0.2em;" font-size="4"> KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI</h3>
                    <h3 style="line-height: 0.2em;"> UNIVERSITAS ANDALAS</h3>
                    <h3 style="line-height: 0.2em;"> FAKULTAS TEKNOLOGI INFORMASI</h3>
                    <h2 style="line-height: 0.2em;"> JURUSAN SISTEM INFORMASI</h2>
                    <h4 style="line-height: 0.2em;"> Kampus Universitas Andalas, Limau Manis, Padang, Kode Pos 25163</h4>
                    <h5 style="line-height: 0.2em;"><i> Telp: 0751-9824667 website: http://si.fti.unand.ac.id</i></h5>
                </td>
            </tr>
        </table>      
        <hr style="margin-top:-15px" width="800">
        <table width="100%" style="margin-left:35px">
            <tr>
                <td width="70"  align="left">
                    <p align="left">
                    Nomor &nbsp;&nbsp; &nbsp;&nbsp;    : <?php echo $drow->no_surat ?><br>
                    Lampiran&nbsp;&nbsp;: - <br>
                    Hal &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   : <b><?php echo $drow->perihal; ?></b>
                    </p>
                </td>
                <td valign="top" width="30" >
                    <p data-date-format="dd-mm-yyyy">Padang, <?php echo date("d F Y", strtotime($drow->tgl_surat)) ?></p>
                </td>           
            </tr>
        </table>
        <p style="margin-left:35px">
            Kepada,<br>
            Yth. <?php echo $drow->untuk ?><br>
            Di
        </p>
            <ol style="margin-left:35px"><p style="margin-top:-20px">Tempat</p></ol>
            <p style="margin-left:35px">Dengan hormat,</p><br>
            <p style="margin-left:35px">Sehubungan dengan pembelajaran matakuliah <?php echo $drow->keperluan ?>, maka mahasiswa berikut :</p>
        <br>
        <table style="border-collapse:collapse;" align="center" width="70%" border="1">	
            <thead>
        		<tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
        		</tr>
            </thead>
            <tbody>	
                <?php  
                    $no = 1;
                    foreach ($data as $lihat):
                ?>	
                <tr>
                    <td><center><?php echo $no++ ?></td>
                    <td><?php echo ucwords($lihat->nama) ?></td>
                    <td><center><?php echo $lihat->nim ?></td>                           
		        </tr>
                <?php endforeach; ?>
            </tbody>    
	    </table>
        <br>
        <p align="justify" style="margin-left:35px">Membutuhkan data dan infomasi dari Institusi yang Bapak/Ibu pimpin. Oleh karena itu mohon izin dan bantuan dari Bapak/Ibu untuk memberikan data yang diperlukan.<br><br>
           Demikianlah disampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.<br></p>
        <table width="100%">
            <tr>
                <td width="270"></td>
                <td width="60">
                    Ketua, <br><br><br><br><br>
                    <b>Darwison, MT</b><br>
                    <b>NIP : 196409141995121001</b>                    
                </td>                
            </tr>
        </table>
    </body>
</html>

