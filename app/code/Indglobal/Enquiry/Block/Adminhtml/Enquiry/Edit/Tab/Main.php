<?php
namespace Indglobal\Enquiry\Block\Adminhtml\Enquiry\Edit\Tab;

/**
 * Cms page edit form main tab
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('enquiry');

        /*
         * Checking if user have permissions to save information
         */
        if ($this->_isAllowedAction('Indglobal_Enquiry::save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('enquiry_main_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Enquiry Information')]);

        if ($model->getId()) {
            $fieldset->addField('enquiry_id', 'hidden', ['name' => 'enquiry_id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'author',
            'text',
            [
                'name' => 'author',
                'label' => __('Contact Number'),
                'title' => __('Contact Number'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email Id'),
                'title' => __('Email Id'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        $fieldset->addField(
            'subject',
            'text',
            [
                'name' => 'subject',
                'label' => __('Subject'),
                'title' => __('Subject'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        
        // $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        // $fieldset->addField('published_at', 'date', [
        //     'name'     => 'published_at',
        //     'date_format' => $dateFormat,
        //     'image'    => $this->getViewFileUrl('images/grid-cal.gif'),
        //     'value' => $model->getPublishedAt(),
        //     'label'    => __('Publishing Date'),
        //     'title'    => __('Publishing Date'),
        //     'required' => false
        // ]);
        
        $this->_eventManager->dispatch('adminhtml_enquiry_edit_tab_main_prepare_form', ['form' => $form]);

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Enquiry Information');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Enquiry Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
