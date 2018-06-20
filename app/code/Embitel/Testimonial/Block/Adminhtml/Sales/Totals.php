<?php

namespace Embitel\Testimonial\Block\Adminhtml\Sales;

class Totals extends \Magento\Framework\View\Element\Template {

	protected $_dataHelper;

	protected $_currency;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Embitel\Testimonial\Helper\Data $dataHelper,
		\Magento\Directory\Model\Currency $currency,
		array $data = []
		) {
		parent :: __construct($context, $data);
		$this -> _dataHelper = $dataHelper;
		$this -> _currency = $currency;
	} 

	public function getOrder() {
		return $this -> getParentBlock() -> getOrder();
	} 

	public function getSource() {
		return $this -> getParentBlock() -> getSource();
	} 

	public function getCurrencySymbol() {
		return $this -> _currency -> getCurrencySymbol();
	} 

	public function initTotals() {
		$this -> getParentBlock();
		$this -> getOrder();
		$this -> getSource();

		
		if ($this -> getSource() -> getFreeforyou()) {
			$total = new \Magento\Framework\DataObject([
				'code' => 'freeforyou',
				'value' => $this -> getSource() -> getFreeforyou(),
				'label' => $this -> _dataHelper -> getFeeLabelFreeforyou(),
				]
				);
			$this -> getParentBlock() -> addTotalBefore($total, 'grand_total');
		} 
	

		return $this;
	} 
} 
