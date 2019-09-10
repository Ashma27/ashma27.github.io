<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'abkasa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/* Admin */
$route['admin'] = "admin/admin/index";
$route['admin/checkLogin'] = "admin/admin/checkLogin";
$route['admin/dashboard'] = "admin/admin/dashboard";
$route['admin/changePassword'] = "admin/admin/changePassword";
$route['admin/doChangePassword'] = "admin/admin/doChangePassword";
$route['admin/logout'] = "admin/admin/logout";
$route['admin/limitedStock'] = "admin/product/limitedStock";

/* Admin Category */
$route['admin/category'] = "admin/category";
$route['admin/addCategory'] = "admin/category/addCategory";
$route['admin/addCategory/(:any)'] = "admin/category/addCategory/$1";
$route['admin/doAddCategory'] = "admin/category/doAddCategory";
$route['admin/doEditCategory/(:any)'] = "admin/category/doEditCategory/$1";
$route['admin/deleteCategory/(:any)'] = "admin/category/deleteCategory/$1";


/* Admin Sub Category */
$route['admin/subCategory'] = "admin/category/subCategory";
$route['admin/addsubCategory'] = "admin/category/addSubCategory";
$route['admin/addsubCategory/(:any)'] = "admin/category/addSubCategory/$1";
$route['admin/doAddsubCategory'] = "admin/category/doAddsubCategory";
$route['admin/doEditsubCategory/(:any)'] = "admin/category/doEditsubCategory/$1";
$route['admin/deletesubCategory/(:any)'] = "admin/category/deletesubCategory/$1";

/* Admin Product */
$route['admin/product'] = "admin/product";
$route['admin/product/get-product-wrapper'] = "admin/product/get-product-wrapper";
$route['admin/add-product'] = "admin/product/add-product";
$route['admin/add-product/(:any)'] = "admin/product/add-product/$1";
$route['admin/getSubCategory'] = "admin/product/getSubCategory";
$route['admin/doAddProduct'] = "admin/product/doAddProduct";
$route['admin/doEditProduct/(:any)'] = "admin/product/doEditProduct/$1";
$route['admin/add-product-stock/(:any)'] = "admin/product/add-product-stock/$1";
$route['admin/doEditStock/(:any)/(:any)'] = "admin/product/doEditStock/$1/$2";
$route['admin/add-product-image/(:any)'] = "admin/product/add-product-image/$1";
$route['admin/doUploadMainImage/(:any)'] = "admin/product/doUploadMainImage/$1";
$route['admin/doUploadListImage/(:any)'] = "admin/product/doUploadListImage/$1";
$route['admin/delete-product/(:any)'] = "admin/product/delete-product/$1";

/* Admin Order */
$route['admin/order'] = "admin/order";
$route['admin/getOrderWrapper'] = "admin/order/getOrderWrapper";
$route['admin/changeOrderStatus/(:any)'] = "admin/order/changeOrderStatus/$1";
$route['admin/order-detail/(:any)'] = "admin/order/order-detail/$1";
$route['admin/change-ordered-status/(:any)'] = "admin/order/change-ordered-status/$1";
$route['admin/cancelOrder/(:any)'] = "admin/order/cancelOrder/$1";

/* Admin Customer*/
$route['admin/customer'] = "admin/order/customer";
$route['admin/single-customer/(:any)'] = "admin/order/single-customer/$1";

/*Admin Coupon*/
$route['admin/coupon'] = "admin/coupon";
$route['admin/add-coupon'] = "admin/coupon/add-coupon";
$route['admin/add-coupon/(:any)'] = "admin/coupon/add-coupon/$1";
$route['admin/doAddCoupon'] = "admin/coupon/doAddCoupon";
$route['admin/doEditCoupon/(:any)'] = "admin/coupon/doEditCoupon/$1";
$route['admin/delete-coupon/(:any)'] = "admin/coupon/delete-coupon/$1";

/* Admin Site Setting */
$route['admin/faq'] = "admin/site_setting/faq";
$route['admin/add-faq'] = "admin/site_setting/add-faq";
$route['admin/add-faq/(:any)'] = "admin/site_setting/add-faq/$1";
$route['admin/do-add-faq'] = "admin/site_setting/do-add-faq";
$route['admin/do-edit-faq/(:any)'] = "admin/site_setting/do-edit-faq/$1";
$route['admin/delete-faq/(:any)'] = "admin/site_setting/delete-faq/$1";
$route['admin/privacy-policy'] = "admin/site_setting/privacy-policy";
$route['admin/return-policy'] = "admin/site_setting/return-policy";
$route['admin/terms-and-condition'] = "admin/site_setting/terms-and-condition";
$route['admin/carousel'] = "admin/site_setting/carousel";
$route['admin/add-carousel'] = "admin/site_setting/add-carousel";
$route['admin/add-carousel/(:any)'] = "admin/site_setting/add-carousel/$1";
$route['admin/doAddCarousel'] = "admin/site_setting/doAddCarousel";
$route['admin/doEditCarousel/(:any)'] = "admin/site_setting/doEditCarousel/$1";
$route['admin/deleteCarousel/(:any)'] = "admin/site_setting/deleteCarousel/$1";
$route['admin/about-us'] = "admin/site_setting/about-us";
$route['admin/shipping-policy'] = "admin/site_setting/shipping-policy";

//* Admin Sizing */
$route['admin/brand'] = "admin/sizing/index";
$route['admin/brand/(:any)'] = "admin/sizing/index/$1";
$route['admin/doAddBrand'] = "admin/sizing/doAddBrand";
$route['admin/doEditBrand/(:any)'] = "admin/sizing/doEditBrand/$1";
$route['admin/deleteBrand/(:any)'] = "admin/sizing/deleteBrand/$1";
$route['admin/size/(:any)'] = "admin/sizing/size/$1";
$route['admin/doAddSize/(:any)'] = "admin/sizing/doAddSize/$1";
$route['admin/fit/(:any)/(:any)'] = "admin/sizing/fit/$1/$2";
$route['admin/doUpdateFit/(:any)'] = "admin/sizing/doUpdateFit/$1";
$route['admin/deleteSize/(:any)/(:any)'] = "admin/sizing/deleteSize/$1/$2";

$route['admin/newsletter'] = "admin/sizing/newsletter";
$route['admin/home-consultation'] = "admin/sizing/home-consultation";
$route['admin/single-home-consultation/(:any)'] = "admin/sizing/single-home-consultation/$1";
$route['admin/size-guide'] = "admin/sizing/size-guide";
// $route['admin/sizeGuideDoUpload'] = "admin/sizing/sizeGuideDoUpload";

/* Admin Top selling */
$route['admin/top-selling'] = "admin/sizing/top-selling-product";


/*Admin SMS  */
$route['admin/sms'] = "admin/sms/index";
$route['admin/add-sms'] = "admin/sms/add-sms";
$route['admin/add-sms/(:any)'] = "admin/sms/add-sms/$1";
$route['admin/doAddSms'] = "admin/sms/doAddSms";
$route['admin/doEditSms/(:any)'] = "admin/sms/doEditSms/$1";
$route['admin/doDeleteSms/(:any)'] = "admin/sms/doDeleteSms/$1";
$route['admin/fit-guarantee'] = "admin/site_setting/fit-guarantee";

/* Special Product */

$route['admin/designer-product'] = "admin/special/index"; 
$route['admin/addDesignerProduct'] = "admin/special/addDesignerProduct";
$route['admin/doAddDesignerProduct'] = "admin/special/doAddDesignerProduct";
$route['admin/addDesignerProduct/(:any)'] = "admin/special/addDesignerProduct/$1";
$route['admin/doEditDesignerProduct/(:any)'] = "admin/special/doEditDesignerProduct/$1";
$route['admin/deleteDesignerProduct/(:any)'] = "admin/special/deleteDesignerProduct/$1";

$route['admin/special-product'] = "admin/special/special-product"; 
$route['admin/doEditSpecialProduct'] = "admin/special/doEditSpecialProduct";

/* Front End */
$route['category/(:any)'] = "abkasa/category/$1";
$route['product/(:any)'] = "abkasa/product/$1";
$route['contact-us']="abkasa/contact-us";
$route['do-add-contact']="abkasa/do-add-contact";
$route['shop']="abkasa/shop";
$route['frequently-asked-question']="abkasa/frequently-asked-question";
$route['privacy-policy']="abkasa/privacy-policy";
$route['return-policy']="abkasa/return-policy";
$route['terms-and-condition']="abkasa/terms-and-condition";
$route['about-us']="abkasa/about";
$route['sizing']="abkasa/sizing";
$route['shipping-policy']="abkasa/shipping-policy";
$route['fit-guarantee']="abkasa/fit-guarantee";
$route['special-design']="abkasa/special-design";
$route['special-product']="abkasa/special-product";


