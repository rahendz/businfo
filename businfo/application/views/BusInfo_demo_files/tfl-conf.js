// CONFIG.JS
// This file is used to set global template variables

// ======== STATISTICS ========== //
// Set the account used to track page statistics in HitBox
// 1 =	Global 'group' account
// 2 =	Pages hosted on TfL web server
// 3 = 	Live Travel News
// 4 =	Journey Planner
// 5 =	Congestion Charge
// 6 =  Oyster
// 7 =	Help and Contact
// 8 =	redroutepayments.tfl.gov.uk
// 9 =	trafficalerts.tfl.gov.uk
//10 =	wap.tfl.gov.uk
//11 =	visitorshop.tfl.gov.uk

   var statsAccount = 2;

// ===== DEVELOPMENT MODE ======= //
// Set to 1 to enable development mode
// This will direct usage statistics to the development HitBox account
// and disable features that only work in the live environment

   var devMode = 0;	// Default: 0


// ===== GLOBAL PARAMETERS ====== //
// The following parameters set global template behaviours

   var externalSiteInNewWindow = 1; // If set to '1', links to external
   									// websites open in a new window	
