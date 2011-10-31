/**
 * 
 */
var resultShop= null;
var resultProduct= null;
var firstResutl=null;

function getShopSearchResult(){
	var lat=zclient.location.latitude;
	var long=zclient.location.longitude;
	var keywordBox=document.getElementById("keywordBox");
	var keyword= null;
	if(keywordBox) keyword= keywordBox.value;
	if(!keyword) {
		keyword="đèn";
		keywordBox.focus();
		//return;
	}
	var r= zclient.search.distance;
	var page=1;
	var num=4;
	if(!r) r=5;
	//alert(lat + " " + long);
	//getdata.php?module=jobshop&task=listshop&page=ajax&k=đèn&l=10.751,106.651&r=10&p=1&n=5
	var source= context+"/getdata.php";
	/**
	 * Get Product
	 */
	$.getJSON(source,
			{async:false,module:"jobproduct",task:"listshop",page:"ajax",k:keyword,l:lat+","+long,r:r,p:page,n:num}
			,function(result){
				doAfterLoadProduct(result);
			});
	/**
	 * Get Shop
	 */
	$.getJSON(source,
			{async:false,module:"jobshop",task:"listshop",page:"ajax",k:keyword,l:lat+","+long,r:r,p:page,n:num}
			,function(result){
				doAfterLoadResult(result);
			});
}
/**
 * Get relative Products for a Product in a Shop
 * @param shop_id
 * @param product_id
 */
function getRelativeProduct(product_id,shop_id){
	/**
	 * Get Product in Shop Shop
	 */
	var source= context+"/getdata.php";
	$.getJSON(source,
			{async:false,module:"jobproduct",task:"shopPro",page:"ajax",shop_id:shop_id}
			,function(result){
				doAfterLoadRelativeProduct(result);
			});
}
/**
 * Do After load Shop Data
 * @param data
 */
function doAfterLoadResult(data){
	resultShop= new Array();
	for(var i in data){
		var id= data[i].ID;
		resultShop[''+id+'']= data[i];
	}
	showShops(data);
	/**
	 * Show First Result
	 */
	if(firstResult)
		viewProductShop(firstResult.ID,firstResult.SHOP_ID);
}
/**
 * Do after load Product Data
 * @param result
 */
function doAfterLoadProduct(result){
	resultProduct=result;
	var obj=null;
	var html="";
	firstResult=null;
	for(i in result){
		obj= result[i];
		if(i==0) firstResult= obj;
		var strObj= generateHTMLForProduct(obj);
		html+=strObj;
	}
	
	var list=document.getElementById("productResultList");
	var pageHTML= document.getElementById("pageTemplate").innerHTML;
	html+=pageHTML;
	list.innerHTML=html;
}
/**
 * Do After load relative product
 * @param data
 */
function doAfterLoadRelativeProduct(result){
	//resultProduct=result;
	var obj=null;
	var html="";
	for(i in result){
		obj= result[i];
		var strObj= generateHTMLForRelativeProduct(obj);
		html+=strObj;
	}
	
	var list=document.getElementById("listRelativeProduct");
	list.innerHTML=html;
}
/**
 * Generate HTML Code for Product JS Object
 * @param obj
 * @returns
 */
function generateHTMLForProduct(obj){
	var str= document.getElementById("productTemplate").innerHTML;
	var price=parseFloat(obj.PRICE);
	var priceStr= addCommas(price+"");
	var shopID= obj.SHOP_ID;
	var image= context+"/public/data/img/shop_"+obj.SHOP_ID+"/pro_"+obj.ID+"/thumb_"+obj.IMAGE1;
	str=str.replace(/#NAME#/g, obj.NAME);
	str=str.replace(/#ID#/g, obj.ID);
	str=str.replace(/#DESCRIPTION#/g, obj.DESCRIPTION);
	str=str.replace(/#PRICE#/g, priceStr);
	str=str.replace(/#IMAGE#/g, image);
	str=str.replace(/#SHOP_ID#/g, shopID);
	str=str.replace(/#VOTEUP#/g, obj.VOTEUP);
	str=str.replace(/#VOTEDOWN#/g, obj.VOTEDOWN);
	
	return str;
}
/**
 * Generate HTML Code for Relative Product Obj
 * @param obj
 * @returns
 */
function generateHTMLForRelativeProduct(obj){
	var str= document.getElementById("relativeProductTemplate").innerHTML;
	var price=parseFloat(obj.PRICE);
	var priceStr= addCommas(price+"");
	var shopID= obj.SHOP_ID;
	var image= context+"/public/data/img/shop_"+obj.SHOP_ID+"/pro_"+obj.ID+"/thumb_"+obj.IMAGE1;
	str=str.replace(/#NAME#/g, obj.NAME);
	str=str.replace(/#ID#/g, obj.ID);
	str=str.replace(/#DESCRIPTION#/g, obj.DESCRIPTION);
	str=str.replace(/#PRICE#/g, priceStr);
	str=str.replace(/#IMAGE#/g, image);
	str=str.replace(/#SHOP_ID#/g, shopID);
	str=str.replace(/#VOTEUP#/g, obj.VOTEUP);
	str=str.replace(/#VOTEDOWN#/g, obj.VOTEDOWN);
	
	return str;
}
/**
 * Generate Infomation Box for a Shop
 * @param obj
 * @returns
 */
function generateHTMLForShopMarker(obj){
	var str= document.getElementById("shopMarkerTemplate").innerHTML;
	var img= "";
	if(obj.IMAGE){
		img=context+"/public/data/img/shop_"+obj.ID+"/thumb_"+obj.IMAGE;
	}else{
		img=context+"/public/images/no_img.jpg";
	}
	str= str.replace(/#NAME#/g,obj.NAME);
	str= str.replace(/#IMAGE#/g,img);
	str= str.replace(/#DESCRIPTION#/g,obj.DESCRIPTION);
	str= str.replace(/#ADDRESS#/g,obj.ADDRESS);
	str= str.replace(/#PHONE#/g,obj.PHONE);
	return str;
}
/**
 * Generate HTML Code for Shop Information Box
 * @param obj
 * @returns
 */
function generateHTMLForShopInformationBox(obj){
	var str= document.getElementById("shopInformationBoxTemplate").innerHTML;
	var img= "";
	if(obj.IMAGE){
		img=context+"/public/data/img/shop_"+obj.ID+"/thumb_"+obj.IMAGE;
	}else{
		img=context+"/public/images/no_img.jpg";
	}
	str= str.replace(/#NAME#/g,obj.NAME);
	str= str.replace(/#IMAGE#/g,img);
	str= str.replace(/#DESCRIPTION#/g,obj.DESCRIPTION);
	str= str.replace(/#ADDRESS#/g,obj.ADDRESS);
	str= str.replace(/#PHONE#/g,obj.PHONE);
	return str;
}

/**
 * Vote Up/Down (Type) for Pro/Shop (ObjType) with ID = id 
 * @param type
 * @param objType
 * @param id
 * @returns
 */
function doVote(type,objType,id){
	var source= context+"/index.php";
	$.getJSON(source,
			{async:false,module:"jobupdate",task:"vote",
			page:"ajax",sid:id,o:objType,t:type}
			,function(result){
				doAfterVote(result);
			});
}
function doAfterVote(data){
	if(data.success){
		var id= data.id;
		var newValue= data.value;
		var type= data.type;
		var up= data.up;
		var obj=document.getElementById("voteUpButton_"+id); 
		if(!up) obj=document.getElementById("voteDownButton_"+id);
		if(obj) obj.innerHTML= newValue;
	}else{
		alert("Không thể thực hiện bình chọn !");
	}
}

/**
 * Do when focus on a Product in a Shop
 * @param shop_id
 */
function viewProductShop(product_id,shop_id){
	var shop= resultShop[shop_id];
	/**
	 * View information box in Map
	 */
	if(shop){
		var marker= shop.marker;
		if(marker){
			
		}
		/**
		 * Show Direction
		 */
		showDirection(shop);
		/**
		 * Show shop Information
		 */
		var html= generateHTMLForShopInformationBox(shop);
		var htmlObj=document.getElementById("shopInformationBox");
		if(htmlObj) htmlObj.innerHTML= html;
		/**
		 * Get Relative Products
		 */
		getRelativeProduct(product_id,shop_id);
		
	}else{
		alert("Cannot find Shop");
	}
	
}

function addCommas(nStr)
{
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}
