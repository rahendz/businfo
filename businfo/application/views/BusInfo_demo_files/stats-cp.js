// TFL CONFIGURATION CODE //

// This uses parameters set in '/tfl-config.js' to assign the account number

if (window.devMode==1){
	statsAccount = 0;
}
var accountNumber;

switch (window.statsAccount){
	case 0:
		accountNumber = "DM531204B2RC98EN3";				// 'development'
		break;
	case 1:
		accountNumber = "DM55110166ED";						// 'group' only
		break;
	case 2:
		accountNumber = "DM5309094MAN98EN3;DM55110166ED"; 	// 'www.tfl.gov.uk' and 'group'
		break;	
	case 3:
		accountNumber = "DM5309091PAS98EN3;DM55110166ED"; 	// 'live travel news' and 'group'
		break;
	case 4:
		accountNumber = "DM530909M5ED98EN3;DM55110166ED";	// 'journey planner' and 'group'
		break;
	case 5:
		accountNumber = "DM540320LIFD98EN3;DM55110166ED";	// 'congestion charge' and 'group'
		break;
	case 6:
		accountNumber = "DM5403204BNS98EN3;DM55110166ED";	// 'oyster' and 'group'
		break;
	case 7:
		accountNumber = "DM540320COBD98EN3;DM55110166ED";	// 'help and contact' and 'group'
		break;
	case 8:
		accountNumber = "DM540320DMAR98EN3;DM55110166ED";	// 'red route payments' and 'group'
		break;
	case 9:
		accountNumber = "DM540320H5FR98EN3;DM55110166ED";	// 'traffic alerts' and 'group'
		break;
	case 10:
		accountNumber = "WD540320LPVD98EN3;DM55110166ED";	// 'wap.tfl.gov.uk' and 'group'
		break;
	case 11:
		accountNumber = "DM540320BMAD98EN3;DM55110166ED";	// 'visitorshop.tfl.gov.uk' and 'group'
		break;
	default:
		accountNumber = "DM55110166ED";						// 'group' only
}




<!--WEBSIDESTORY CODE HBX2.0 (Universal)-->
<!--COPYRIGHT 1997-2005 WEBSIDESTORY,INC. ALL RIGHTS RESERVED. U.S.PATENT No. 6,393,479B1. MORE INFO:http://websidestory.com/privacy-->
var _hbEC=0,_hbE=new Array;function _hbEvent(a,b){b=_hbE[_hbEC++]=new Object();b._N=a;b._C=0;return b;}
var hbx=_hbEvent("pv");hbx.vpc="HBX0200u";hbx.gn="ehg-tfl.hitbox.com";

//CUSTOM TFL FUNCTION FOR PAGE TITLE
function _gf(x){return x.substring(x.lastIndexOf("/")+1,x.length);};
var file_title=_gf(location.pathname) + ' [' + document.title + ']';   

//BEGIN EDITABLE SECTION
//CONFIGURATION VARIABLES   DM55110166ED
hbx.acct=accountNumber;
hbx.pn=file_title;//PAGE NAME(S) //customisation to get variable from page title from custom function above
hbx.mlc="CONTENT+CATEGORY";//MULTI-LEVEL CONTENT CATEGORY
hbx.pndef="title";//DEFAULT PAGE NAME

hbx.ctdef="full";//DEFAULT CONTENT CATEGORY

//OPTIONAL PAGE VARIABLES
//ACTION SETTINGS
hbx.fv="";//FORM VALIDATION MINIMUM ELEMENTS OR SUBMIT FUNCTION NAME
hbx.lt="auto";//LINK TRACKING
hbx.dlf="n";//DOWNLOAD FILTER
hbx.dft="n";//DOWNLOAD FILE NAMING
hbx.elf="n";//EXIT LINK FILTER

//SEGMENTS AND FUNNELS
hbx.seg="";//VISITOR SEGMENTATION
hbx.fnl="";//FUNNELS

//CAMPAIGNS
hbx.cmp="";//CAMPAIGN ID
hbx.cmpn="";//CAMPAIGN ID IN QUERY
hbx.dcmp="";//DYNAMIC CAMPAIGN ID
hbx.dcmpn="";//DYNAMIC CAMPAIGN ID IN QUERY
hbx.dcmpe="";//DYNAMIC CAMPAIGN EXPIRATION
hbx.dcmpre="";//DYNAMIC CAMPAIGN RESPONSE EXPIRATION
hbx.hra="";//RESPONSE ATTRIBUTE
hbx.hqsr="";//RESPONSE ATTRIBUTE IN REFERRAL QUERY
hbx.hqsp="";//RESPONSE ATTRIBUTE IN QUERY
hbx.hlt="";//LEAD TRACKING
hbx.hla="";//LEAD ATTRIBUTE
hbx.gp="";//CAMPAIGN GOAL
hbx.gpn="";//CAMPAIGN GOAL IN QUERY
hbx.hcn="";//CONVERSION ATTRIBUTE
hbx.hcv="";//CONVERSION VALUE
hbx.cp="null";//LEGACY CAMPAIGN
hbx.cpd="";//CAMPAIGN DOMAIN

//CUSTOM VARIABLES
hbx.ci="";//CUSTOMER ID
hbx.hc1="";//CUSTOM 1
hbx.hc2="";//CUSTOM 2
hbx.hc3="";//CUSTOM 3
hbx.hc4="";//CUSTOM 4
hbx.hrf="";//CUSTOM REFERRER
hbx.pec="";//ERROR CODES

//INSERT CUSTOM EVENTS
		
//END EDITABLE SECTION
<!--END WEBSIDESTORY CODE-->
