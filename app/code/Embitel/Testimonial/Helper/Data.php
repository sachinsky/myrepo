<?php

namespace Embitel\Testimonial\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper {

	
	const CONFIG_CUSTOM_IS_ENABLED_FREEFORYOU = 'freeforyou_customfee/freeforyou_customfee/freeforyou_status';
	const CONFIG_CUSTOM_FEE_FREEFORYOU = 'freeforyou_customfee/freeforyou_customfee/freeforyou_customfeeamount';
	const CONFIG_FEE_LABEL_FREEFORYOU = 'freeforyou_customfee/freeforyou_customfee/freeforyou_name';
	const CONFIG_MINIMUM_ORDER_AMOUNT_FREEFORYOU = 'freeforyou_customfee/freeforyou_customfee/freeforyou_minimumorderamount';

	public function isModuleEnabledFreeforyou() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$isEnabled = $this -> scopeConfig -> getValue(self :: CONFIG_CUSTOM_IS_ENABLED_FREEFORYOU, $storeScope);
		return $isEnabled;
	} 

	public function getCustomFeeFreeforyou() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$fee = $this -> scopeConfig -> getValue(self :: CONFIG_CUSTOM_FEE_FREEFORYOU, $storeScope);
		return $fee;
	} 

	public function getFeeLabelFreeforyou() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$feeLabel = $this -> scopeConfig -> getValue(self :: CONFIG_FEE_LABEL_FREEFORYOU, $storeScope);
		return $feeLabel;
	} 

	public function getMinimumOrderAmountFreeforyou() {
		$storeScope = \Magento\Store\Model\ScopeInterface :: SCOPE_STORE;
		$MinimumOrderAmount = $this -> scopeConfig -> getValue(self :: CONFIG_MINIMUM_ORDER_AMOUNT_FREEFORYOU, $storeScope);
		return $MinimumOrderAmount;
	} 
	

} 
