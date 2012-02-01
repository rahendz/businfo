<?php

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function ajax_SearchStopBusArroundPlace()
	{
		$rows=$this->SearchBusStopArroundPlace($_GET['bound_lat'],$_GET['bound_lng'],$_GET['radius']);
		$temp['title']="BusInfo for Hochiminh";
		$temp['init_lat'] = 10.770023;
		$temp['init_long'] = 106.685461;
		$temp['init_add'] = "Hồ Chí Minh, Việt Nam";//$add;
		$htmltext = json_encode($rows);
		$temp['htmltext'] = $htmltext;
		$temp['queryTram'] = $rows;
		$this->load->view("ResultSearchBusStopArroundPlace",$temp);
	
	}
	
	public function SearchBusStopArroundPlace($boundlat,$boundlng,$delta)
	{
		if (isset($delta)) $delta = $delta;
		else $delta = 500;
		$delta = $delta * 0.85 / 100000;
		$temp['b_top_lat'] = $boundlat + $delta;
		$temp['b_top_lng'] = $boundlng + $delta;
		$temp['b_bot_lat'] = $boundlat - $delta;
		$temp['b_bot_lng'] = $boundlng - $delta;
        $this->load->model("TramBusModel");
        $options = array('mode' => 'search', 'min_lat' => $temp['b_bot_lat'], 'min_lng' => $temp['b_bot_lng'], 'max_lat' => $temp['b_top_lat'], 'max_lng' => $temp['b_top_lng']);
    //    $rows = $this->TramBusModel->getTramBus($options);
      	$rows=$this->db->query("select *,". 
      	" sqrt(power(geo_long-".$boundlng.",2)+ power(geo_lat-".$boundlat.",2)) as KhoangCach".
      	" FROM trambus WHERE". 
      	" geo_lat between ".$temp['b_bot_lat']. " And ".$temp['b_top_lat'].
      	" AND geo_long between ".$temp['b_bot_lng']. " And ".$temp['b_top_lng'].
      	" ORDER BY KhoangCach");
      	
      	//echo $rows->num_rows();
	 	return $rows->result();
	}
	
	public function ajax_SearchBusPlace()
	{
		$rows=$this->SearchBusStopArroundPlace($_GET['bound_lat'],$_GET['bound_lng'],$_GET['radius']);
		$temp['title']="BusInfo for Hochiminh";
		$temp['init_lat'] = 10.770023;
		$temp['init_long'] = 106.685461;
		$temp['init_add'] = "Hồ Chí Minh, Việt Nam";//$add;
		$htmltext = json_encode($rows);
		$temp['htmltext'] = $htmltext;
		$temp['queryTram'] = $rows;
	 	
		
		$this->load->model("TramBusModel");
		$this->load->model("TuyenBusModel");
		$this->load->model("LoTrinhDiModel");
		$this->load->model("LoTrinhVeModel");
		
		
		$StrBus='';
		$htmlBus='';
		$htmlLoTrinhDi='';
		$htmlLoTrinhVe='';
		$i=0;
		if ($htmltext!="false")
		{
		foreach ($temp['queryTram'] as $item)
		{
			if($i==0)
			{
			$StrBus.= $item->tuyendiqua;
			}
			else 
			{
			$StrBus.=",". $item->tuyendiqua;
			}
			$i++;
		}
		echo $StrBus;
		
		$BusArray = explode(",", $StrBus);
		$BusArray2;
		echo count($BusArray);
		for($j=0;$j<count($BusArray);$j++)
		{
			
			$bus= $BusArray[$j];
			$count=1;
			//echo $bus;
			for ($k=$j+1;$k<count($BusArray);$k++)
			{
			if($BusArray[$k]==$bus)
			{	
				$count++;
				//unset($BusArray[$j]);
				//break;
			}	
			}
			if($count==1)
			{
				echo $bus;
			$BusArray2[]=$bus;
			}
		}
		
		$i=0;
		for($h=0; $h<count($BusArray2);$h++)
		{
			//echo $BusArray2[$h];
			$route=$BusArray2[$h];
			
			$this->load->model("TuyenBusModel");
			$options2 = array('matuyen' => $route);
			$BusRows = $this->TuyenBusModel->getTuyenBus($options2);
			$rows1 = $this->LoTrinhDiModel->getLoTrinh_WithLatLong($options2);
			$rows2 = $this->LoTrinhVeModel->getLoTrinh_WithLatLong($options2);
			
			if ($i==0)
			{
				$htmlBus.= $BusRows->matuyen . ';'.$BusRows->tentuyen;
				$htmlLoTrinhDi.= json_encode($rows1);
				$htmlLoTrinhVe.= json_encode($rows2);
			}
			else
			{
				$htmlBus.='%'.$BusRows->matuyen . ';'.$BusRows->tentuyen;
				$htmlLoTrinhDi.= '%'.json_encode($rows1);
				$htmlLoTrinhVe.= '%'.json_encode($rows2);
			}
			$i++;
		}
		}
		$temp['htmlBus'] = $htmlBus;
		$temp['htmlLoTrinhDi'] = $htmlLoTrinhDi;
		$temp['htmlLoTrinhVe'] = $htmlLoTrinhVe;
		
		$this->load->view("ResultSearchBusPlace",$temp);
	
	}

// Hàm tìm những tuyến có lộ trình đi hoặc về có qua các trạm
	public function TimBusLoTrinh($queryTram, $DiOrVe)
	{
		$StrBus='';
		$i=0;
		foreach ($queryTram as $item)
		{
			//$options3 = array('matram' => $item->matram);
			//echo $item->matram;
			//$temp['queryLoTrinhDi'] = $this->LoTrinhDiModel->getLoTrinh($options3);
			//echo $item->matram;
			If($DiOrVe=="Di")
				$query = $this->db->query("select * from lotrinhdi where matram=". $item->matram);  
			else 
				$query = $this->db->query("select * from lotrinhve where matram=". $item->matram);
			
			if($query->num_rows()>0)
			{
  				foreach($query->result() as $LoTrinh)
  				{
					//echo $LoTrinhDi->matuyen;
					if($i==0)
						$StrBus.= $LoTrinh->matuyen."-".$LoTrinh->stttram;
					else 
						$StrBus.=",". $LoTrinh->matuyen."-".$LoTrinh->stttram;
					$i++;
				//	echo $StrBus;
				}
			}
		}
		
		
		// loại bỏ những tuyến trùng 
		$BusArray = explode(",", $StrBus);
		$i=0;
		$BusArrayNew="";
		//echo count($BusArray);
		if($StrBus!="")
		{
		for($j=0;$j<count($BusArray);$j++)
		{
			$BusArrayTram = explode("-", $BusArray[$j]);
			$bus= $BusArrayTram[0];
			$stttramArray="";
			
			$count=1;
			for ($k=$j+1;$k<count($BusArray);$k++)
			{
				$BusArrayTram2 = explode("-", $BusArray[$k]);
				if($BusArrayTram2[0]==$bus)
				{	
					$count++;
				}	
			}
			
			if($count==1)
			{
				$t=0;
				for ($k=0;$k<=$j;$k++)
				{
					$BusArrayTram3 = explode("-", $BusArray[$k]);
					if($BusArrayTram3[0]==$bus)
					{	
						if($t==0)
						{
							$stttramArray.=$BusArrayTram3[1];
							$t++;
						}
						else 
							$stttramArray.="%".$BusArrayTram3[1];
					}	
				}
				if($i==0)
				{
					$BusArrayNew= $BusArrayNew.$bus."&".$DiOrVe."-".$stttramArray;
					$i++;
				}
				else 
					$BusArrayNew= $BusArrayNew.";".$bus."&".$DiOrVe."-".$stttramArray;
			}
		
		}
		}
		//echo $BusArrayNew;
		return $BusArrayNew;
	
	}
	

// Hàm tìm lộ trình chung 1 tuyến
	public function TimLoTrinhChung($BusArrayLoTrinhDiemDau,$BusArrayLoTrinhDiemCuoi)
	{
		$BusArrayChungLT="";
		$SttTramDau;
		$count=0;
		for($h=0; $h<count($BusArrayLoTrinhDiemDau);$h++)
		{	
			if($BusArrayLoTrinhDiemDau[$h]!="")
			{
				$BusArrayDiemDau = explode("-", $BusArrayLoTrinhDiemDau[$h]);
				$BusDiArray=explode("&",$BusArrayDiemDau[0]);
				$BusDi=$BusDiArray[0];
				$SttTramDau=explode("%", $BusArrayDiemDau[1]);
					
				for($j=0; $j<count($BusArrayLoTrinhDiemCuoi);$j++)
				{
					$BusArrayDiemCuoi = explode("-", $BusArrayLoTrinhDiemCuoi[$j]);
					$BusArrayCuoi= explode("&",$BusArrayDiemCuoi[0]);
					if($BusDi==$BusArrayCuoi[0])
					{
						$SttTramCuoi = explode("%", $BusArrayDiemCuoi[1]);
						//echo $busdi;
						if ($SttTramDau[0]<=$SttTramCuoi[0])
						{
							$count++;
							if ($count==1)
								$BusArrayChungLT.=$BusArrayLoTrinhDiemDau[$h].">".$BusArrayLoTrinhDiemCuoi[$j];
							else 
								$BusArrayChungLT.=";".$BusArrayLoTrinhDiemDau[$h].">".$BusArrayLoTrinhDiemCuoi[$j];
						}
					}
				
				}
			}
		}
		//echo $BusArrayChungLT;
		return $BusArrayChungLT;
			
	}  	

// Hàm tìm 1 tuyến theo lộ trình đi
	public function TimMotTuyenTheoLoTrinhDi($queryTramDi,$queryTramDen,$htmltextDi,$htmltextDen,$DiOrVe)
	{
		$BusLoTrinhDiDiemDau="";
		$BusLoTrinhDiDiemCuoi="";
		if (($htmltextDi!="false") && ($htmltextDen!="false"))
		{
			$BusLoTrinhDiDiemDau=$this->TimBusLoTrinh($queryTramDi,$DiOrVe);
			$BusLoTrinhDiDiemCuoi=$this->TimBusLoTrinh($queryTramDen,$DiOrVe);
			$BusArrayLoTrinhDiDiemDau = explode(";", $BusLoTrinhDiDiemDau);
			$BusArrayLoTrinhDiDiemCuoi= explode(";", $BusLoTrinhDiDiemCuoi);
			//echo $BusLoTrinhDiDiemDau;
			//echo $BusLoTrinhDiDiemCuoi;
			if(($BusArrayLoTrinhDiDiemDau!="")&&($BusLoTrinhDiDiemCuoi!=""))		
				$LoTrinhChung=$this->TimLoTrinhChung($BusArrayLoTrinhDiDiemDau, $BusArrayLoTrinhDiDiemCuoi);
			else $LoTrinhChung="";
		}
		else 		
			$LoTrinhChung="";
		
		return $LoTrinhChung;
	}	

	
// Hàm tìm lộ trình 2 tuyến

	public  function  TimLoTrinh2Tuyen($queryTramDi,$queryTramDen,$htmltextDi,$htmltextDen)
	{
		$BusLoTrinhDiDiemDau="";
		$BusLoTrinhDiDiemCuoi="";
		$htmlHuongDanDi="";
		if (($htmltextDi!="false") && ($htmltextDen!="false"))
		{	
			$DiOrVe="Di";
			$BusLoTrinhDiDiemDau.=$this->TimBusLoTrinh($queryTramDi,$DiOrVe);
			$BusLoTrinhDiDiemCuoi.=$this->TimBusLoTrinh($queryTramDen,$DiOrVe);
			$DiOrVe="Ve";
			$BusLoTrinhDiDiemDau.=";".$this->TimBusLoTrinh($queryTramDi,$DiOrVe);
			$BusLoTrinhDiDiemCuoi.=";".$this->TimBusLoTrinh($queryTramDen,$DiOrVe);
			$BusArrayLoTrinhDiDiemDau = explode(";", $BusLoTrinhDiDiemDau);
			$BusArrayLoTrinhDiDiemCuoi= explode(";", $BusLoTrinhDiDiemCuoi);
			//echo $BusLoTrinhDiDiemDau;
			//echo $BusLoTrinhDiDiemCuoi;
			$LoTrinhDiChung="";
			$LoTrinhDiChung=$this->Tim2TuyenTramGiao($BusArrayLoTrinhDiDiemDau, $BusArrayLoTrinhDiDiemCuoi);
			$htmlHuongDanDi.=$this->TimHuongDanDi($LoTrinhDiChung);			
		}	
		return  $htmlHuongDanDi;
	}

// Hàm tìm lộ trình 2 tuyến trạm giao và trạm xung quanh
	public  function  Tim2TuyenTramGiao($BusArrayLoTrinhDiDiemDau,$BusArrayLoTrinhDiDiemCuoi)
	{
		//Tìm trạm giao nhau
				
		$LoTrinhDi="";
		$LoTrinhTramTrucTiep="";
		$LoTrinhTramXungQuanh="";
		$SttTramDau;
		$count=0;
		for($h=0; $h<count($BusArrayLoTrinhDiDiemDau);$h++)
		{
			if($BusArrayLoTrinhDiDiemDau[$h]!="")
			{
				$BusArrayDiemDau = explode("-", $BusArrayLoTrinhDiDiemDau[$h]);
				//echo $BusArrayDiemDau;
				$BusDiArray=explode("&",$BusArrayDiemDau[0]);
				$BusDi=$BusDiArray[0];
				$SttTramDau=explode("%", $BusArrayDiemDau[1]);
				
				$queryTramGiaoArray = $this->db->query("select distinct matram, count(matram) ".
				"from lotrinh".$BusDiArray[1]." where matram in ".
				"(select matram from lotrinh".$BusDiArray[1]." where matuyen='".$BusDi."' and stttram >".$SttTramDau[0].")".
				" group by matram order by count(matram) desc");
				
				if($queryTramGiaoArray->num_rows()>0)
				{
					$countTramGiao=0;
					$countTuyen=0;
					$countKQTramTrucTiep=0;
					// Tìm trạm giao trực tiếp
					
  					foreach($queryTramGiaoArray->result() as $TramBus)
		  			{
						//echo $TramBus->matram.";";
						if ($countTuyen==($queryTramGiaoArray->num_rows()-1))
							$LoTrinhTramTrucTiep.=";";
						//echo count($BusArrayLoTrinhDiDiemDau).",".$count;
				  		for($t=0; $t<count($BusArrayLoTrinhDiDiemCuoi);$t++)
						{
							if($BusArrayLoTrinhDiDiemCuoi[$t]!="")
							{	
								$BusArrayDiemCuoi = explode("-", $BusArrayLoTrinhDiDiemCuoi[$t]);
								//echo $BusArrayDiemDau;
								$BusDenArray=explode("&",$BusArrayDiemCuoi[0]);
								$BusDen=$BusDenArray[0];
								$SttTramCuoi=explode("%", $BusArrayDiemCuoi[1]);
								
								$queryTramGiao = $this->db->query("select distinct matram, count(matram) ".
								"from lotrinh".$BusDenArray[1]." where ".
								"matram='".$TramBus->matram."' and ".
								"matram in (select matram from lotrinh".$BusDenArray[1].
								" where matuyen='".$BusDen."' and stttram <".$SttTramCuoi[0].")".
								" group by matram order by count(matram) desc");
																							
								if($queryTramGiao->num_rows()>0)
								{
									$countKQTramTrucTiep++;
									$TramBusGiao=$queryTramGiao->row(0);
									$stttram=$this->db->query("select * from lotrinh".$BusDiArray[1]. 
									" where matram='".$TramBusGiao->matram."' and matuyen='".
									$BusDi."'");
									//echo $BusDi;
									$sttTramGiao=$stttram->row(0);
									if($countTramGiao==0)
									{									
			  							$LoTrinhTramTrucTiep.=$BusArrayLoTrinhDiDiemDau[$h].">".$BusArrayDiemDau[0].
					  					"-".$sttTramGiao->stttram.">".$BusArrayLoTrinhDiDiemCuoi[$t];
					  					//"-".$TramBusGiao->matram.">".$BusArrayLoTrinhDiDiemCuoi[$t];
										$countTramGiao++;
									}
									else
										$LoTrinhTramTrucTiep.=";".$BusArrayLoTrinhDiDiemDau[$h].">".$BusArrayDiemDau[0].
					  					"-".$sttTramGiao->stttram.">".$BusArrayLoTrinhDiDiemCuoi[$t];
					  					// "-".$TramBusGiao->matram.">".$BusArrayLoTrinhDiDiemCuoi[$t];
								}
							}
						}
						$countTuyen++;							
		  			}
		  			// Tìm trạm giao xung quanh
		  			if($countKQTramTrucTiep==0)
		  			{
		  				
			  			foreach($queryTramGiaoArray->result() as $TramBus)
			  			{
			  				//tìm trạm xung quanh rồi xét xem tuyến đến có đi qua ko
			  				$queryInFoTram=$this->db->query("select * from trambus where matram='".$TramBus->matram."'");
			  				$querySttTramDung= $this->db->query("select * from lotrinh".$BusDiArray[1]. 
									" where matram='".$TramBus->matram."' and matuyen='".
									$BusDi."'");
							$ret_sttTramDung=$querySttTramDung->row(0);		
			  				$ret_InfoTram=$queryInFoTram->row(0);
			  				$rowsTramXungQuanh=$this->SearchBusStopArroundPlace($ret_InfoTram->geo_lat,$ret_InfoTram->geo_long,600);
							
			  				if(count($rowsTramXungQuanh)!=0)
			  				{
			  					
			  					foreach($rowsTramXungQuanh as $Tram)
			  					{
			  						$countTuyen=0;
			  						
			  						//echo $Tram->matram.";";
			  						for($t=0; $t<count($BusArrayLoTrinhDiDiemCuoi);$t++)
									{
										if($BusArrayLoTrinhDiDiemCuoi[$t]!="")
										{
											if ($countTuyen==0)
												$LoTrinhTramXungQuanh.=";";	
											$BusArrayDiemCuoi = explode("-", $BusArrayLoTrinhDiDiemCuoi[$t]);
											//echo $BusArrayDiemDau;
											$BusDenArray=explode("&",$BusArrayDiemCuoi[0]);
											$BusDen=$BusDenArray[0];
											$SttTramCuoi=explode("%", $BusArrayDiemCuoi[1]);
											
											$queryTramGiao = $this->db->query("select distinct matram, count(matram) ".
											"from lotrinh".$BusDenArray[1]." where ".
											"matram='".$Tram->matram."' and ".
											"matram in (select matram from lotrinh".$BusDenArray[1].
											" where matuyen='".$BusDen."' and stttram <".$SttTramCuoi[0].")".
											" group by matram order by count(matram) desc");
											
											if($queryTramGiao->num_rows()>0)
											{
												$countKQTramTrucTiep++;
												$TramBusGiao=$queryTramGiao->row(0);
												$stttram=$this->db->query("select * from lotrinh".$BusDenArray[1]. 
												" where matram='".$TramBusGiao->matram."' and matuyen='".
												$BusDen."'");

												$sttTramGiao=$stttram->row(0);
												if($countTramGiao==0)
												{									
						  							$LoTrinhTramXungQuanh.=$BusArrayLoTrinhDiDiemDau[$h].">".
						  							$BusArrayDiemDau[0]."-".$ret_sttTramDung->stttram.">".
						  							$BusArrayDiemCuoi[0]."-".$sttTramGiao->stttram.">".
						  							$BusArrayLoTrinhDiDiemCuoi[$t];
								  					//"-".$TramBusGiao->matram.">".$BusArrayLoTrinhDiDiemCuoi[$t];
													$countTramGiao++;
												}
												else
													$LoTrinhTramXungQuanh.=";".$BusArrayLoTrinhDiDiemDau[$h].">".
						  							$BusArrayDiemDau[0]."-".$ret_sttTramDung->stttram.">".
						  							$BusArrayDiemCuoi[0]."-".$sttTramGiao->stttram.">".
						  							$BusArrayLoTrinhDiDiemCuoi[$t];
								  					// "-".$TramBusGiao->matram.">".$BusArrayLoTrinhDiDiemCuoi[$t];
								  			}
								  			$countTuyen++;
										}
										
									}
								}
			  					break;
			  				}
			  			}
		  			}
				}
			}
		}	
		//echo $LoTrinhTramTrucTiep;
		//echo "END";
		//Tìm Lộ trình chung giao nhau ( duyệt bỏ trùng)
		$LoTrinh2TuyenTramGiaoTrucTiep=$this->ChuoiLoTrinh2TuyenTramGiaoTrucTiep($LoTrinhTramTrucTiep);
		$LoTrinh2TuyenTramGiaoXungQuanh=$this->ChuoiLoTrinh2TuyenTramGiaoXungQuanh($LoTrinhTramXungQuanh);
		echo $LoTrinh2TuyenTramGiaoTrucTiep;
		//echo $LoTrinh2TuyenTramGiaoXungQuanh;
		$LoTrinh2Tuyen=$LoTrinh2TuyenTramGiaoTrucTiep.";".$LoTrinh2TuyenTramGiaoXungQuanh;
		
		return $LoTrinh2Tuyen;
	}

// Hàm Lọc Lại Chuỗi lộ trình 2 tuyến trạm trực tiếp
	public  function ChuoiLoTrinh2TuyenTramGiaoTrucTiep($LoTrinhTramTrucTiep)
	{
		$BusArrayLoTrinhChung;
		if($LoTrinhTramTrucTiep!="")
		{
			$BusArrayLoTrinhDi = explode(";", $LoTrinhTramTrucTiep);
				
			$BusArrayLoTrinhChung[]=$BusArrayLoTrinhDi[0];
			//echo $BusArrayLoTrinhChung[0];
			for ($i=1; $i<count($BusArrayLoTrinhDi);$i++)
			{
				if($BusArrayLoTrinhDi[$i]!="")
				{
					$BusLoTrinh = explode(">", $BusArrayLoTrinhDi[$i]);
					$countLoTrinh=0;
					for($k=0; $k <count($BusArrayLoTrinhChung);$k++)
					{
						$BusLoTrinh2 = explode(">", $BusArrayLoTrinhChung[$k]);
						//echo $BusArrayLoTrinhChung[$k];
						//echo $BusLoTrinh2[1];
						if(($BusLoTrinh[0]==$BusLoTrinh2[0])&&($BusLoTrinh[2]==$BusLoTrinh2[2]))
						{	
							$countLoTrinh++;
							$TramGiao=explode("-",$BusLoTrinh[1]);
							$TramGiaoArray=explode("%", $BusLoTrinh2[1]);
							$CountTram=0;
							for ($j=0;$j<count($TramGiaoArray);$j++)
							{
								if($TramGiao[1]==$TramGiaoArray[$j])
									$CountTram++;
							}
							if ($CountTram==0)
							{
								//echo $TramGiao[1]."%";
								$BusTramDau=$BusLoTrinh2[0];
								$BusTramGiao=$BusLoTrinh2[1];
								$BusTramGiao=$BusTramGiao."%".$TramGiao[1];
								//echo $BusTramGiao;
								$BusTramCuoi= $BusLoTrinh2[2];
								$BusArrayLoTrinhChung[$k]=$BusTramDau.">".$BusTramGiao.">".$BusTramCuoi;
							}
						}
					}
					if ($countLoTrinh==0)
						$BusArrayLoTrinhChung[]=$BusArrayLoTrinhDi[$i];
				}
			}
			$LoTrinhDiChung="";
			for($k=0; $k <count($BusArrayLoTrinhChung);$k++)
			{
				//$BusLoTrinh2 = explode(">", $BusArrayLoTrinhChung[$k]);
				//echo $BusArrayLoTrinhChung[$k];
				if($k==0)
					$LoTrinhDiChung.=$BusArrayLoTrinhChung[$k];
				else
					$LoTrinhDiChung.=";".$BusArrayLoTrinhChung[$k];
				//echo $BusLoTrinh2[1];
			}
			return $LoTrinhDiChung;
		}	
	}

// Hàm Lọc Lại Chuỗi lộ trình 2 tuyến trạm xung quanh
	public  function ChuoiLoTrinh2TuyenTramGiaoXungQuanh($LoTrinhTramXungQuanh)
	{
		$BusArrayLoTrinhChung;
		if($LoTrinhTramXungQuanh!="")
		{
			$BusArrayLoTrinhDi = explode(";", $LoTrinhTramXungQuanh);
				
			$BusArrayLoTrinhChung[]=$BusArrayLoTrinhDi[0];
			//echo $BusArrayLoTrinhChung[0];
			for ($i=1; $i<count($BusArrayLoTrinhDi);$i++)
			{
				if($BusArrayLoTrinhDi[$i]!="")
				{
					$BusLoTrinh = explode(">", $BusArrayLoTrinhDi[$i]);
					$countLoTrinh=0;
					for($k=0; $k <count($BusArrayLoTrinhChung);$k++)
					{
						$BusLoTrinh2 = explode(">", $BusArrayLoTrinhChung[$k]);
						//echo $BusArrayLoTrinhChung[$k];
						//echo $BusLoTrinh2[1];
						if(($BusLoTrinh[0]==$BusLoTrinh2[0])&&($BusLoTrinh[3]==$BusLoTrinh2[3]))
						{	
							$countLoTrinh++;
							$TramGiao=explode("-",$BusLoTrinh[2]);
							$TramGiaoArray=explode("%", $BusLoTrinh2[2]);
							$CountTram=0;
							for ($j=0;$j<count($TramGiaoArray);$j++)
							{
								if($TramGiao[1]==$TramGiaoArray[$j])
									$CountTram++;
							}
							if ($CountTram==0)
							{
								//echo $TramGiao[1]."%";
								$BusTramDau=$BusLoTrinh2[0];
								$BusTramDung=$BusLoTrinh2[1];
								$BusTramGiao=$BusLoTrinh2[2];
								$BusTramGiao=$BusTramGiao."%".$TramGiao[1];
								//echo $BusTramGiao;
								$BusTramCuoi= $BusLoTrinh2[3];
								$BusArrayLoTrinhChung[$k]=$BusTramDau.">".$BusTramDung.">".$BusTramGiao.">".$BusTramCuoi;
							}
						}
					}
					if ($countLoTrinh==0)
						$BusArrayLoTrinhChung[]=$BusArrayLoTrinhDi[$i];
				}
			}
			$LoTrinhDiChung="";
			for($k=0; $k <count($BusArrayLoTrinhChung);$k++)
			{
				//$BusLoTrinh2 = explode(">", $BusArrayLoTrinhChung[$k]);
				//echo $BusArrayLoTrinhChung[$k];
				if($k==0)
					$LoTrinhDiChung.=$BusArrayLoTrinhChung[$k];
				else
					$LoTrinhDiChung.=";".$BusArrayLoTrinhChung[$k];
				//echo $BusLoTrinh2[1];
			}
			return $LoTrinhDiChung;
		}	
	}
	

// // Hàm tìm lộ trình 3 tuyến

	public  function  TimLoTrinh3Tuyen($queryTramDi,$queryTramDen,$htmltextDi,$htmltextDen)
	{
		$BusLoTrinhDiDiemDau="";
		$BusLoTrinhDiDiemCuoi="";
		$htmlHuongDanDi="";
		if (($htmltextDi!="false") && ($htmltextDen!="false"))
		{	
			$DiOrVe="Di";
			$BusLoTrinhDiDiemDau.=$this->TimBusLoTrinh($queryTramDi,$DiOrVe);
			$BusLoTrinhDiDiemCuoi.=$this->TimBusLoTrinh($queryTramDen,$DiOrVe);
			$DiOrVe="Ve";
			$BusLoTrinhDiDiemDau.=";".$this->TimBusLoTrinh($queryTramDi,$DiOrVe);
			$BusLoTrinhDiDiemCuoi.=";".$this->TimBusLoTrinh($queryTramDen,$DiOrVe);
			$BusArrayLoTrinhDiDiemDau = explode(";", $BusLoTrinhDiDiemDau);
			$BusArrayLoTrinhDiDiemCuoi= explode(";", $BusLoTrinhDiDiemCuoi);
			//echo $BusLoTrinhDiDiemDau;
			//echo $BusLoTrinhDiDiemCuoi;
			$LoTrinhDiChung="";
			$LoTrinhDiChung=$this->Tim3TuyenTramGiao($BusArrayLoTrinhDiDiemDau, $queryTramDen,$htmltextDen);
			$htmlHuongDanDi=$LoTrinhDiChung;			
		}	
		return  $htmlHuongDanDi;
	}	



// Hàm tìm lộ trình 3 tuyến trạm giao và trạm xung quanh
	public  function  Tim3TuyenTramGiao($BusArrayLoTrinhDiDiemDau,$queryTramDen,$htmltextDen)
	{
		//Tìm trạm giao nhau
				
		$LoTrinhDi="";
		$LoTrinhTramTrucTiep="";
		$LoTrinhTramXungQuanh="";
		$SttTramDau;
		$count=0;
		$LoTrinh3Tuyen="";
		for($h=0; $h<count($BusArrayLoTrinhDiDiemDau);$h++)
		{
			if($BusArrayLoTrinhDiDiemDau[$h]!="")
			{
				$BusArrayDiemDau = explode("-", $BusArrayLoTrinhDiDiemDau[$h]);
				//echo $BusArrayDiemDau;
				$BusDiArray=explode("&",$BusArrayDiemDau[0]);
				$BusDi=$BusDiArray[0];
				$SttTramDau=explode("%", $BusArrayDiemDau[1]);
				
				$queryTramGiaoArray = $this->db->query("select distinct matram, count(matram) ".
				"from lotrinh".$BusDiArray[1]." where matram in ".
				"(select matram from lotrinh".$BusDiArray[1]." where matuyen='".$BusDi."' and stttram >".$SttTramDau[0].")".
				" group by matram order by count(matram) desc");
				
				if($queryTramGiaoArray->num_rows()>0)
				{
					$countTramGiao=0;
					$countTuyen=0;
					$countKQTramTrucTiep=0;
					// Tìm trạm giao trực tiếp
					
  					foreach($queryTramGiaoArray->result() as $TramBus)
		  			{
						//echo $TramBus->matram;
						$queryInFoTram=$this->db->query("select * from trambus where matram='".$TramBus->matram."'");
						$ret_InfoTram=$queryInFoTram->row(0);
						$queryTrungGian=$this->SearchBusStopArroundPlace($ret_InfoTram->geo_lat,$ret_InfoTram->geo_long,600);
						$htmltextTrungGian = json_encode($queryTrungGian);
						$LoTrinh2Tuyen=$this->TimLoTrinh2Tuyen($queryTrungGian, $queryTramDen,$htmltextTrungGian ,$htmltextDen);
						
						//echo "*".$LoTrinh2Tuyen."*";
						if (trim($LoTrinh2Tuyen,";")!="") 
						{
							//echo "* ".trim($LoTrinh2Tuyen,";")." *";
							$DiemDau=$this->TimHuongDanDi($BusArrayLoTrinhDiDiemDau[$h]);
							$LoTrinh3Tuyen.=";".$DiemDau.">".$BusArrayDiemDau[0]."-".
								$TramBus->matram.">".trim($LoTrinh2Tuyen,";");
							break;
						}
					}
				}
			}
		}	
		
		/*echo $LoTrinhTramTrucTiep;
		echo "END";
		//Tìm Lộ trình chung giao nhau ( duyệt bỏ trùng)
		$LoTrinh2TuyenTramGiaoTrucTiep=$this->ChuoiLoTrinh2TuyenTramGiaoTrucTiep($LoTrinhTramTrucTiep);
		$LoTrinh2TuyenTramGiaoXungQuanh=$this->ChuoiLoTrinh2TuyenTramGiaoXungQuanh($LoTrinhTramXungQuanh);
		//echo $LoTrinh2TuyenTramGiaoTrucTiep;
		echo $LoTrinh2TuyenTramGiaoXungQuanh;
		$LoTrinh2Tuyen=$LoTrinh2TuyenTramGiaoTrucTiep.";".$LoTrinh2TuyenTramGiaoXungQuanh;
		*/
		//echo $LoTrinh3Tuyen;
		return $LoTrinh3Tuyen;
	}
	
	
	
// Hàm tìm hướng dẫn đi - chuyển stttram -> matram
	public  function TimHuongDanDi($LoTrinhDiChung)
	{
		$htmlHuongDanDi="";
		$HuongDanDiArray= explode(";", $LoTrinhDiChung);
		$count=0;
		for($j=0; $j< count($HuongDanDiArray);$j++)
		{
			if($count!=0)$htmlHuongDanDi.=";";
			$count=1;
			$HuongDanDiArrayDetail = explode(">", $HuongDanDiArray[$j]);
			$count1=0;
			for ($k=0;$k<count($HuongDanDiArrayDetail);$k++)
			{
				if($HuongDanDiArrayDetail[$k]!="")
				{
				$BusInfoArray=explode("-", $HuongDanDiArrayDetail[$k]);
				$BusDiOrVe=explode("&",$BusInfoArray[0]);
				$TuyenBus=$BusDiOrVe[0];
				$DiOrVe=$BusDiOrVe[1];
				if ($count1!=0)	$htmlHuongDanDi.=">";
				$count1=1;
				$htmlHuongDanDi.=$BusInfoArray[0]."-";
				$SttTramArray=explode("%", $BusInfoArray[1]);
				$count2=0;
				for($t=0;$t<count($SttTramArray);$t++)
				{
					if($SttTramArray[$t]!="")
					{
					$query = $this->db->query("select *from lotrinh".$DiOrVe." ltd, trambus tb where ltd.matram=tb.matram".
					" and matuyen = '".$TuyenBus."' and stttram='". $SttTramArray[$t]."'");
					
					if($query->num_rows()>0)
					{
  						foreach($query->result() as $TramBus)
		  				{
							//echo $TramBus->matram;
							if($count2==0)
								$htmlHuongDanDi.=$TramBus->matram;	
							else 
								$htmlHuongDanDi.="%".$TramBus->matram;
							$count2++;
						//	echo $StrBus;
						}
					}
					}
				}
				}
				
			}
							
		}
		
		return $htmlHuongDanDi;
	}
	
	public function ajax_SearchBusRoute()
	{
	 	$temp['title']="BusInfo for Hochiminh";
		$temp['init_lat'] = 10.770023;
		$temp['init_long'] = 106.685461;
		$temp['init_add'] = "Hồ Chí Minh, Việt Nam";//$add;
	 	
		$this->load->model("TramBusModel");
		$this->load->model("TuyenBusModel");
		$this->load->model("LoTrinhDiModel");
		$this->load->model("LoTrinhVeModel");
	 	
	 	 
	 	//ĐIỂM 1:
		
		$rowsFrom=$this->SearchBusStopArroundPlace($_GET['bound_lat_from'],$_GET['bound_lng_from'],$_GET['radius']);
		
		$htmltextDi = json_encode($rowsFrom);
		//echo $htmltext;
		$temp['htmltextDi'] = $htmltextDi;
		$temp['queryTramDi'] = $rowsFrom;
		
		//ĐIỂM 2
		
		$rowsTo=$this->SearchBusStopArroundPlace($_GET['bound_lat_to'],$_GET['bound_lng_to'],$_GET['radius']);
		
		$htmltextDen = json_encode($rowsTo);
		$temp['htmltextDen'] = $htmltextDen;
		//echo $htmltext;
		$temp['queryTramDen'] = $rowsTo;

		//	TÌM LỘ TRÌNH 1 TUYẾN
		$htmlBus='';
		$htmlLoTrinhDi='';
		$htmlLoTrinhVe='';
		$htmlHuongDanDi='';
		// Duyệt lộ trình đi
		$LoTrinhDiChung= $this->TimMotTuyenTheoLoTrinhDi($temp['queryTramDi'], $temp['queryTramDen'],$temp['htmltextDi'] ,$temp['htmltextDen'],"Di" );
		
		//echo $LoTrinhDiChung;
				
		//echo $htmlHuongDanDi;
		if ($LoTrinhDiChung=="")
		{
			echo "Không có lộ trình đi chung";			
		}
		else
		{
			// Tìm Hướng dẫn đi
			$htmlHuongDanDi.=$this->TimHuongDanDi($LoTrinhDiChung);
		}
				
		//Duyệt lộ trình về
		$LoTrinhVeChung= $this->TimMotTuyenTheoLoTrinhDi($temp['queryTramDi'], $temp['queryTramDen'],$temp['htmltextDi'] ,$temp['htmltextDen'],"Ve" );
		if ($LoTrinhVeChung=="")
		{
			echo "Không có lộ trình ve chung";			
		}
		else
		{
			// Tìm Hướng dẫn đi
			$htmlHuongDanDi.=$this->TimHuongDanDi($LoTrinhVeChung);
		}
		
		
		//TÌM 2 TUYẾN
		$LoTrinh2Tuyen="";
		if(($LoTrinhDiChung=="") &&($LoTrinhVeChung==""))
		{
			echo "phải tìm 2 tuyến";
			
			$LoTrinh2Tuyen=$this->TimLoTrinh2Tuyen($temp['queryTramDi'], $temp['queryTramDen'],$temp['htmltextDi'] ,$temp['htmltextDen']);
			//echo "*".$LoTrinh2Tuyen."*";
			$htmlHuongDanDi.=$LoTrinh2Tuyen;		
		}
		
		if(($LoTrinhDiChung=="") &&($LoTrinhVeChung=="")&&(trim($LoTrinh2Tuyen,";")==""))
		{
			echo "phải tìm 3 tuyến";
			$LoTrinh3Tuyen=$this->TimLoTrinh3Tuyen($temp['queryTramDi'], $temp['queryTramDen'],$temp['htmltextDi'] ,$temp['htmltextDen']);
			//echo "*".$LoTrinh3Tuyen."*";
			$htmlHuongDanDi.=$LoTrinh3Tuyen;
		}
		$temp['htmlBus'] = $htmlBus;
		$temp['htmlLoTrinhDi'] = $htmlLoTrinhDi;
		$temp['htmlLoTrinhVe'] = $htmlLoTrinhVe;
		$temp['htmlHuongDanDi'] = $htmlHuongDanDi;
		
		$this->load->view("ResultSearchBusRoute",$temp);
	
	}
}
?>