// JavaScript Document
var xmlHttp;
var dimDelay = 300;
var showTime = 700;
var tmpPageName;

function createXMLHttpRequest()
{	
	/*if(window.ActiveXObject)
	{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else if(window.XMLHttpRequest)
	{
		xmlHttp = new XMLHttpRequest();
	}
	
	return xmlHttp;*/
	
	// initially set the object to false 
	if (window.XMLHttpRequest)
	{
		  // check for Safari, Mozilla, Opera...
	  xmlHttp = new XMLHttpRequest();
	}
	else if (window.ActiveXObject) 
	{
	  // check for Internet Explorer
	  xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (!xmlHttp)
	{
	  alert("บราวเซอร์ของท่านไม่สนับสนุนการใช้งาน Ajax ค่ะ");
	  // return false in case of failure
	  return false;
	}
	  // return the object in case of success
	//return XMLHttpRequestObject;
}


//Check numeric format ------------------------------------------------------------------------------
function CheckNumeric(str_item)
{	
	var flag_positive = true;
	for(var i = 0;i < str_item.length; ++i)
		if(!((parseInt(str_item.charAt(i)) >= 0)&&(parseInt(str_item.charAt(i)) <= 9)))		
	    	flag_positive = false;															
		
	return flag_positive;
}

function formatCurrency(val){
	if(val == "" || val == null || val == "NULL") return val;

	//Split Decimals
    var arrs = val.toString().split(".");
	//Split data and reverse
	var revs = arrs[0].split("").reverse().join("");
	var len = revs.length;
    var tmp = "";
    for(i = 0; i < len; i++){
        if(i >0 && (i%3) == 0){
            tmp+=","+revs.charAt(i);
        }else{
            tmp += revs.charAt(i);
        }
    }  

	//Split data and reverse back
	tmp = tmp.split("").reverse().join("");
	//Check Decimals
    if(arrs.length > 1 && arrs[1] != undefined){
        tmp += "."+ arrs[1];
    }
    return tmp;
}

Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 }; //----------  วิธีใช้ (123456789.12345).formatMoney(2, '.', ',');
 
//End function ------------------------------------------------------------------------------


//Check GreenCard ID Format ------------------------------------------------------------
function checkID(id)
{
	if(id.length != 13) return false;
	for(i=0, sum=0; i < 12; i++)
	sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
	return false; return true;
}
//Check GreenCard ID Format ------------------------------------------------------------

//--------------------------- Function Check Change Password ----------------------------------------------
function chkChgPass(obj)
{	
	if(obj.newPass1.value != obj.newPass2.value)
	{
		alert("กรุณากรอกรหัสผ่านใหม่และยืนยันรหัสผ่านใหม่ให้ตรงกันด้วยค่ะ");
		obj.newPass1.focus();
		return false;
	}
	
	if(!confirm('ยืนยันการแก้ไขรหัสผ่านใช่หรือไม่ค่ะ !'))
	{
		return false;
	}
	
	return true;
}
//--------------------------- End Function Check Change Password ----------------------------------------------

//--------------------------- Function Change Video Detail ----------------------------------------------
function showVideoDetail(obj)
{	
	if(obj.value == '1')
	{
		document.getElementById('youtubeDetailTR').style.display = '';
		document.getElementById('videoDetailTR').style.display = 'none';
	}
	
	if(obj.value == '2')
	{
		document.getElementById('youtubeDetailTR').style.display = 'none';
		document.getElementById('videoDetailTR').style.display = '';
	}
}
//--------------------------- End Function Change Video Detail ----------------------------------------------

//--------------------------- Function Change Video Manage Detail ----------------------------------------------
function showVideoManDetail(obj)
{	
	if(obj.value == '1')
	{
		document.getElementById('youtubeManDetailTR').style.display = '';
		document.getElementById('videoManDetailTR').style.display = 'none';
	}
	
	if(obj.value == '2')
	{
		document.getElementById('youtubeManDetailTR').style.display = 'none';
		document.getElementById('videoManDetailTR').style.display = '';
	}
}
//--------------------------- End Function Change Video Manage Detail ----------------------------------------------


//--------------------------- Function Show Manange Detail ------------------------------------------
function showManageDetail(obj, manageName, manageTopic)
{	
	tmpPageName = manageName;

	if(obj.options[obj.selectedIndex].value == 0)
	{
		alert("กรุณาเลือกข้อมูล "+manageTopic+" ที่ต้องการปรับปรุงด้วยค่ะ");
		obj.focus();
		return false;
	}

	var url = "includes/ajax/inq"+tmpPageName+".php?";
	url = url + "selectID=" + obj.options[obj.selectedIndex].value;
			
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = handleShowManageDetailAjax;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function handleShowManageDetailAjax()
{	
	if(xmlHttp.readyState == 1)
	{
		document.getElementById(tmpPageName+'DivDetail').style.display = 'none';
		document.getElementById(tmpPageName+'DivDetail').innerHTML = '';
		document.getElementById(tmpPageName+'Loading').style.display = '';
	}
	
	if(xmlHttp.readyState == 4)
	{
		if(xmlHttp.status == 200)
		{			
			document.getElementById(tmpPageName+'DivDetail').innerHTML = xmlHttp.responseText;
			
			jQX(function(){				
				jQX("#"+tmpPageName+"Loading").fadeOut(showTime);
				jQX("#"+tmpPageName+"DivDetail").delay(dimDelay+300).slideDown(showTime - 200);
			})();
			
			return true;
		}
	}
}
//--------------------------- End Function Show  Manange Video Detail -------------------------------------------


//--------------------------- Start Function List Data In Drop Down Box ------------------------------------------
/*
rankID = ID ของอันดับ List
startObj = Object ที่เป็น List เริ่มต้นในการเลือก
targetObj = Oblect ที่เป็นเป้าหมายที่ต้องการให้เปลี่ยน
listQueryPageName = ชื่อ Page ของ PHP ที่ใช้ Query ข้อมูล Ajax
listObjID = ชื่อของ ID สำหรับไว้แสดงหรือซ่อน ต้องเอาไปรวมกับค่า rankID แล้วจะได้ ID จริง เช่น listProductLI + 1 = listProductLI1
numberOfAllList = จำนวนของ List ทั้งหมดทีต้องใช้เพราะเวลาเราจะ Clear List ที่มีทั้งหมดนับตั้งแต่ตัวที่เราเลือก
*/
var tmpRankID, tmpTargetObj, tmpListObjName, tmpNameOfDetailDiv, tmpNumberOfAllList, tmpSelectObj;

function refreshListBoxItem(rankID, startObj, targetObj, listQueryPageName, listObjName, numberOfAllList, nameOfDetailDiv)  
{
	hideListBox(rankID, listObjName, numberOfAllList, nameOfDetailDiv);
	tmpRankID = parseInt(rankID)+1;
	tmpTargetObj = targetObj;
	tmpListObjName = listObjName;
	tmpNumberOfAllList = numberOfAllList;
	tmpNameOfDetailDiv = nameOfDetailDiv;
	tmpSelectObj = startObj.value;
	
	if((startObj.value == "") || (startObj.value == "0") || (startObj.value == 99999))
	{
		return false;
	}
		
	clearListBox(document.getElementById(targetObj));
		
	var url = "includes/ajax/" + listQueryPageName + ".php?selectID="+startObj.value;
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = handleListBoxStateChange;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function handleListBoxStateChange()
{
	if(xmlHttp.readyState == 4)
	{
		if(xmlHttp.status == 200)
		{
			updateListBox();
		}
	}
}

function updateListBox()
{
	var objAmp = document.getElementById(tmpTargetObj);
	var result = xmlHttp.responseText;
	var option = null;
	var k, i;
	p = result.split(",");
	
	option = document.createElement("option");
	option.appendChild(document.createTextNode("---- Please Select Your Items ----"));
	objAmp.appendChild(option);
	objAmp.lastChild.value = "0";
	
	for(i=0; i<p.length-1; i++)
	{
		k = p[i].split("-");
		option = document.createElement("option");
		option.appendChild(document.createTextNode(k[1]));
		objAmp.appendChild(option);
		objAmp.lastChild.value = k[0];
	}
	
	if(tmpTargetObj == "addSubCatProductID")  //-------------  อันนี้เพิ่มมาเฉพาะงานที่ต้องการให้ FadeIn ข้อมูลชุดอื่น ปกติไม่ได้ใช้
	{
		addDescriptionFunc(tmpSelectObj);
	}
	
	if(tmpTargetObj == "modSubCatProductID")  //-------------  อันนี้เพิ่มมาเฉพาะงานที่ต้องการให้ FadeIn ข้อมูลชุดอื่น ปกติไม่ได้ใช้
	{
		modDescriptionFunc(tmpSelectObj);
	}
	
	jQX(function(){				
		jQX("#"+tmpListObjName+tmpRankID).fadeIn(showTime - 200);
		
		if((parseInt(tmpNumberOfAllList) - parseInt(tmpRankID - 1)) == 1)
		{
			jQX("#"+tmpNameOfDetailDiv).fadeIn(showTime - 200);
		}
	})();
}

function hideListBox(rankID, listObjName, numberOfAllList, nameOfDetailDiv)  //  Function สำหรับซ่อน List Box ที่อยู่ต่ำกว่าตัวที่ถูก Event onChange
{	
	for(var i=(parseInt(rankID)+1); i<=parseInt(numberOfAllList); i++)
	{
		document.getElementById(listObjName + i).style.display = 'none';
	}
	
	if(nameOfDetailDiv != "")
	{
		document.getElementById(nameOfDetailDiv).style.display = 'none';
	}
}

function clearListBox(obj)
{
	while(obj.length > 0)
	{
		obj.removeChild(obj.childNodes[0]);
	}
}
//--------------------------- End Function List Data In Drop Down Box ------------------------------------------


//--------------------------- Function Add Description ----------------------------------------------------

function addDescriptionFunc(objValue)
{
	hideAndClearAllDescription();
	var url = "includes/ajax/listDescription.php?selectID="+objValue;
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = handleDescriptionStateChange;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function handleDescriptionStateChange()
{
	if(xmlHttp.readyState == 4)
	{
		if(xmlHttp.status == 200)
		{
			var result = xmlHttp.responseText;
			var option = null;
			var k, i;
			p = result.split("*;*");
			
			for(i=0; i<p.length-1; i++)
			{
				if(p[i] != "-")
				{
					document.getElementById("catTopicDescLabel"+(i+1)).innerHTML = p[i];
					document.getElementById("catTopicDescLI"+(i+1)).style.display = "";
					document.getElementById("catDetailDescLI"+(i+1)).style.display = "";
				}
			}
		}
	}
}

function hideAndClearAllDescription()
{
	for(var i=1; i<=20; i++)
	{
		document.getElementById("catTopicDescLabel"+i).innerHTML = "";
		document.getElementById("catDetailDescLabel"+i).value = "";
		document.getElementById("catTopicDescLI"+i).style.display = "none";
		document.getElementById("catDetailDescLI"+i).style.display = "none";
	}
}

//--------------------------- End Function Add Description ----------------------------------------------------


//--------------------------- Function Modify Description ----------------------------------------------------

function modDescriptionFunc(objValue)
{
	hideAndClearAllModDescription();
	var url = "includes/ajax/listDescription.php?selectID="+objValue;
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = handleModDescriptionStateChange;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function handleModDescriptionStateChange()
{
	if(xmlHttp.readyState == 4)
	{
		if(xmlHttp.status == 200)
		{
			var result = xmlHttp.responseText;
			var option = null;
			var k, i;
			p = result.split("*;*");
			
			for(i=0; i<p.length-1; i++)
			{
				if(p[i] != "-")
				{
					document.getElementById("modCatTopicDescLabel"+(i+1)).innerHTML = p[i];
					document.getElementById("modCatTopicDescLI"+(i+1)).style.display = "";
					document.getElementById("modCatDetailDescLI"+(i+1)).style.display = "";
				}
			}
		}
	}
}

function hideAndClearAllModDescription()
{
	for(var i=1; i<=20; i++)
	{
		document.getElementById("modCatTopicDescLabel"+i).innerHTML = "";
		document.getElementById("modCatDetailDescLabel"+i).value = "";
		document.getElementById("modCatTopicDescLI"+i).style.display = "none";
		document.getElementById("modCatDetailDescLI"+i).style.display = "none";
	}
}

//--------------------------- End Function Add Description ----------------------------------------------------


//-------------------------- Function Add Product Check ----------------------------------------------------
function chkProductForm(objFlag)
{
	if((document.getElementById(objFlag+'BrandProductID').value == "") || (document.getElementById(objFlag+'BrandProductID').value == "0"))
	{
		alert("กรุณาเลือกชื่อยี่ห้อของสินค้าด้วยค่ะ");
		document.getElementById(objFlag+'BrandProductID').focus();
		return false;
	}
	
	if((document.getElementById(objFlag+'TypeProductID').value == "") || (document.getElementById(objFlag+'TypeProductID').value == "0"))
	{
		alert("กรุณาเลือกชื่อประเภทของสินค้าด้วยค่ะ");
		document.getElementById(objFlag+'TypeProductID').focus();
		return false;
	}
	
	if((document.getElementById(objFlag+'CatProductID').value == "") || (document.getElementById(objFlag+'CatProductID').value == "0"))
	{
		alert("กรุณาเลือกชื่อกลุ่มหลักของสินค้าด้วยค่ะ");
		document.getElementById(objFlag+'CatProductID').focus();
		return false;
	}
	
	if((document.getElementById(objFlag+'SubCatProductID').value == "") || (document.getElementById(objFlag+'SubCatProductID').value == "0"))
	{
		alert("กรุณาเลือกชื่อกลุ่มย่อยของสินค้าด้วยค่ะ");
		document.getElementById(objFlag+'SubCatProductID').focus();
		return false;
	}
	
	return true;
}
//-------------------------- End Function Add Product Check ----------------------------------------------------


//-------------------------  Function Show Menu Sampling -------------------------------------------------------
function showMenuDetail(objTarget)
{
	jQX(function(){
		jQX("#"+objTarget).slideToggle(showTime);
	})();
}
//-------------------------  End Function Show Menu Sampling -------------------------------------------------------


//-------------------------  Function Add Review ---------------------------------------------------------------------
function addMemberReview()
{
	if(document.getElementById("reviewComment").value == "")
	{
		alert("กรุณากรอกความคิดเห็นของผู้ใช้ด้วยค่ะ");
		document.getElementById("reviewComment").focus();
		return false;
	}
	
	var url = "includes/control/addReview_Ctl.php?memberID="+document.getElementById("memberReviewID").value;
	url = url + "&productID="+document.getElementById("productReviewID").value;
	url = url + "&reviewRating1="+document.getElementById("reviewRatingValue1").value;
	url = url + "&reviewRating2="+document.getElementById("reviewRatingValue2").value;
	url = url + "&reviewRating3="+document.getElementById("reviewRatingValue3").value;
	url = url + "&reviewRating4="+document.getElementById("reviewRatingValue4").value;
	url = url + "&reviewRating5="+document.getElementById("reviewRatingValue5").value;
	url = url + "&reviewComment="+document.getElementById("reviewComment").value;
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = handleAddMemberReview;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function handleAddMemberReview()
{
	if(xmlHttp.readyState == 1)
	{
		document.getElementById('samplingProductReviewDivMain').style.display = 'none';
		document.getElementById('addSamplingProductReviewLoading').style.display = '';
	}
	
	if(xmlHttp.readyState == 4)
	{
		if(xmlHttp.status == 200)
		{
			jQX(function(){
				jQX("#addSamplingProductReviewLoading").fadeOut(showTime);
				jQX("#addSamplingProductReviewDiv").delay(dimDelay+300).slideDown(showTime - 200);
			})();
			
			return true;
		}
	}
}
//-------------------------  Function Add Review ---------------------------------------------------------------------


//------------------------- Function Check Modify Member Information  ---------------------------------------
function chkMemberInfo()
{
	if(!confirm("ยืนยันการปรับปรุงข้อมูลส่วนตัวใช่หรือไม่ค่ะ"))
	{
		return false;
	}
	
	if(document.getElementById("dateOfBirthMem").value == "")
	{
		alert("กรุณาเลือกวัน/เดือน/ปีเกิดด้วยค่ะ");
		document.getElementById("dateOfBirthMem").focus();
		return false;
	}
	
	if((document.getElementById("newPassMem").value != "") && (document.getElementById("newPassMem2").value == ""))
	{
		alert("กรุณาพิมพ์รหัสผ่านใหม่อีกครั้งด้วยค่ะ");
		document.getElementById("newPassMem2").focus();
		return false;
	}
	
	if(document.getElementById("newPassMem").value != document.getElementById("newPassMem2").value)
	{
		alert("กรุณาพิมพ์รหัสผ่านใหม่และยืนยันรหัสผ่านใหม่ให้ตรงกันด้วยค่ะ");
		document.getElementById("newPassMem").focus();
		return false;
	}
	
	if(document.getElementById("memberName").value == "")
	{
		alert("กรุณากรอกชื่อผู้รับด้วยค่ะ");
		document.getElementById("memberName").focus();
		return false;
	}
	
	if(document.getElementById("memberSurName").value == "")
	{
		alert("กรุณากรอกนามสกุลผู้รับด้วยค่ะ");
		document.getElementById("memberSurName").focus();
		return false;
	}
	
	if(document.getElementById("memberAddress").value == "")
	{
		alert("กรุณากรอกที่อยู่ผู้รับด้วยค่ะ");
		document.getElementById("memberAddress").focus();
		return false;
	}
	
	if(document.getElementById("memberStreet").value == "")
	{
		alert("กรุณากรอกถนนของผู้รับด้วยค่ะ");
		document.getElementById("memberStreet").focus();
		return false;
	}
	
	if(parseInt(document.getElementById("memberCity").options[document.getElementById("memberCity").selectedIndex].value) == 0)
	{
		alert("กรุณาเลือกจังหวัดด้วยค่ะ");
		document.getElementById("memberCity").focus();
		return false;
	}
	
	if(parseInt(document.getElementById("memberAmphor").options[document.getElementById("memberAmphor").selectedIndex].value) == 0)
	{
		alert("กรุณาเลือกอำเภอด้วยค่ะ");
		document.getElementById("memberAmphor").focus();
		return false;
	}
	
	if(parseInt(document.getElementById("memberTumbon").options[document.getElementById("memberTumbon").selectedIndex].value) == 0)
	{
		alert("กรุณาเลือกตำบลด้วยค่ะ");
		document.getElementById("memberTumbon").focus();
		return false;
	}
	
	if(document.getElementById("memberPostalCode").value == "")
	{
		alert("กรุณากรอกรหัสไปรษณีย์ด้วยค่ะ");
		document.getElementById("memberPostalCode").focus();
		return false;
	}
	
	if(document.getElementById("memberPassword").value == "")
	{
		alert("กรุณากรอกรหัสผ่านปัจจุบันด้วยค่ะ");
		document.getElementById("memberPassword").focus();
		return false;
	}
	
	return true;
}
//------------------------- End Function Check Modify Member Information  ---------------------------------------


//----------------------- Function Update Price -----------------------------
function updatePrice(proNO, proPrice)
{
	var proQuan = document.getElementById('proQuan'+proNO).options[document.getElementById('proQuan'+proNO).selectedIndex].value;
	var sumPrice = proPrice * proQuan;
		
	document.getElementById('sumProPrice'+proNO).innerHTML = sumPrice.formatMoney(0, '.', ',');
	document.getElementById('allProPriceShow').innerHTML = "<b>"+sumPrice.formatMoney(0, '.', ',')+"</b>";	
	document.getElementById('allProQuanShow').innerHTML = "<b>"+proQuan+"</b>";
	document.getElementById('allProQuan').value = proQuan;
	document.getElementById('allProPrice').value = sumPrice;	
	document.getElementById('sumPrice'+proNO).value = sumPrice;
	
	if(parseInt(document.getElementById('memberPoint').value) < parseInt(document.getElementById('allProPrice').value))
	{
		document.getElementById('selectProduct').style.display='none';
		document.getElementById('nextProcess').style.display='none';
		document.getElementById('textAlert').style.display='';
	}
	else
	{
		document.getElementById('selectProduct').style.display='';
		document.getElementById('nextProcess').style.display='';
		document.getElementById('textAlert').style.display='none';
	
		if(sumPrice == 0)
		{
			document.getElementById('nextProcess').style.display='none';
		}
		else
		{
			document.getElementById('nextProcess').style.display='';
		}
	}
}
//----------------------- Function Update Price -------------------------


//----------------------- Function Update Price ReSelect -----------------------------
function updatePriceReSelect(proNO, proPrice)
{
	var i, allPrice, allQuan, sumPrice, proQuan;
	allPrice = 0;
	allQuan = 0;	
	
	var proShowCount = parseInt(document.getElementById('proShowCount').value);
	
	for(i = 1; i <= proShowCount; i++)
	{
		sumPrice = 0;
		proQuan = 0;
		
		proQuan = parseInt(document.getElementById('proQuan'+i).options[document.getElementById('proQuan'+i).selectedIndex].value);
		sumPrice = document.getElementById('proPrice'+i).value * proQuan;
		
		allPrice = allPrice + sumPrice;
		allQuan = allQuan + proQuan;
		
		if(proNO == i)
		{			
			document.getElementById('sumPrice'+proNO).value = sumPrice;
			document.getElementById('sumProPrice'+proNO).innerHTML = sumPrice.formatMoney(0, '.', ',');
		}
	}
	
	document.getElementById('allProPriceShow').innerHTML = "<b>"+allPrice.formatMoney(0, '.', ',')+"</b>";	
	document.getElementById('allProQuanShow').innerHTML = "<b>"+allQuan+"</b>";
	document.getElementById('allProQuan').value = allQuan;
	document.getElementById('allProPrice').value = allPrice;
	
	if(parseInt(document.getElementById('memberPoint').value) < parseInt(document.getElementById('allProPrice').value))
	{
		document.getElementById('selectProduct').style.display='none';
		document.getElementById('nextProcess').style.display='none';
		document.getElementById('textAlert').style.display='';
	}
	else
	{
		document.getElementById('selectProduct').style.display='';
		document.getElementById('nextProcess').style.display='';
		document.getElementById('textAlert').style.display='none';
	
		if(allPrice == 0)
		{
			document.getElementById('nextProcess').style.display='none';
		}
		else
		{
			document.getElementById('nextProcess').style.display='';
		}
	}
}
//----------------------- Function Update Price ReSelect -------------------------



//-------------------------  Function Load More ---------------------------------------------------------------------
function loadMoreProduct()
{	
	var url = "includes/ajax/loadMoreProductAjax.php?divNo="+document.getElementById("divNo").value;
	url = url + "&pageNo="+document.getElementById("pageNo").value;
	url = url + "&pageSize="+document.getElementById("pageSize").value;
	url = url + "&pageAll="+document.getElementById("pageAll").value;
	url = url + "&reqCatID="+document.getElementById("reqCatID").value;
	url = url + "&reqBrandID="+document.getElementById("reqBrandID").value;
	url = url + "&reqSubCatID="+document.getElementById("reqSubCatID").value;
	url = url + "&reqSearchText="+document.getElementById("reqSearchText").value;
	
	createXMLHttpRequest();
	xmlHttp.onreadystatechange = handleLoadMoreProduct;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function handleLoadMoreProduct()
{
	var divNo = parseInt(document.getElementById("divNo").value);
	var pageNo = parseInt(document.getElementById("pageNo").value);
	var pageSize = parseInt(document.getElementById("pageSize").value);
	var pageAll = parseInt(document.getElementById("pageAll").value);
	
	if(xmlHttp.readyState == 1)
	{
		document.getElementById('loadMoreButton').style.display = 'none';
		document.getElementById('showMoreProductLoading'+divNo).style.display = '';
	}
	
	if(xmlHttp.readyState == 4)
	{
		if(xmlHttp.status == 200)
		{
			document.getElementById('showMoreProductDiv'+divNo).innerHTML = xmlHttp.responseText;
			document.getElementById("divNo").value = divNo + 1;
			document.getElementById("pageNo").value = pageNo + 1;
			
			jQX(function(){
				jQX("#showMoreProductLoading"+divNo).fadeOut(showTime);
				jQX("#showMoreProductDiv"+divNo).delay(dimDelay+300).slideDown(showTime - 200);
				
				if(pageAll > (divNo+1))
				{
					jQX("#loadMoreButton").delay(dimDelay+300).slideDown(showTime - 200);
				}
			})();		
			
			return true;
		}
	}
}
//-------------------------  Function Add Review ---------------------------------------------------------------------



//-------------------------  Function Change Tab Login  ---------------------------------------------------------------------
$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
//-------------------------  Function Change Tab Login  ---------------------------------------------------------------------