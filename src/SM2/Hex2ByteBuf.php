<?php
//
namespace Mdanter\Ecc\SM2;

class Hex2ByteBuf
{

	public static function ConvertGmp2ByteArray($GmpData)
    {
        $HexStr=gmp_strval($GmpData,16);
        $OutBuf=array();
        $OutBuf=Hex2ByteBuf::HexStringToByteArray($HexStr);
        return $OutBuf;
    }


    public static function ByteArrayToHexString($b, $nlen)
	{
	$outstring = "";
	$n=0;
	$temp=0;
	for($n=0;$n<$nlen;$n++)
	{
	  $outstring = $outstring . Hex2ByteBuf::myhex($b[$n]);
	}
	return  $outstring;
    }
    
    private static function myhex($indata)
	{
		$temp_1=$indata/16;
		if($temp_1<10)
		   $temp_1=$temp_1+0x30;
		else
		   $temp_1=$temp_1+0x41-10; 
		   
		$temp_2=$indata% 16;
		if($temp_2<10)
		   $temp_2=$temp_2+0x30;
		else
		   $temp_2=$temp_2+0x41-10; 
	
		return chr($temp_1) . chr($temp_2);
		 
	}

	public static function HexStringToByteArray($InString)
	{
		for($m=strlen($InString);$m<64;$m++)
		{
			$InString="0" . $InString;
		}
		$g_len=0;
		$nlen=0;
		$n=0;
		$i = 0;
		$temp="";
		$nlen = strlen($InString);
		If ($nlen < 16 ) $g_len = 16;
		$g_len = $nlen / 2;
		
		For( $n = 0;$n<$nlen;$n=$n+2)
		{
		   $temp = substr($InString, $n, 2);
		   $temp = "0x" . $temp;
		   $b[$i] = hexdec($temp) ;
		   $i = $i + 1;
		}
		return $b;
    }
}