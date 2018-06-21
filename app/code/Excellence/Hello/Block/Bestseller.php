<?php
namespace Excellence\Hello\Block;
  
class Bestseller extends \Magento\Framework\View\Element\Template
/*
product by id and sku
{ 
    protected $_productRepository;
  
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Catalog\Model\ProductRepository $productRepository,
        array $data = []
    ) {
        $this->_productRepository = $productRepository;
        parent::__construct($context, $data);
    }
  
    public function getProductById($id) {
        return $this->_productRepository->getById($id);
    }
  
    public function getProductBySku($sku) {
        return $this->_productRepository->get($sku);
    }
}*/

{    
    protected $_categoryFactory;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = []
    )
    {    
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }
    
    public function getCategory($categoryId) 
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }
    
    public function getCategoryProducts($categoryId) 
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('*');
        return $products;
    }
}