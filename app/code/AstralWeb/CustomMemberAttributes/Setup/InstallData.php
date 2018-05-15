<?php

namespace AstralWeb\CustomMemberAttributes\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;



class InstallData implements InstallDataInterface
{

    protected $customerSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;
    /**
     * @param CustomerSetupFactory $customerSetupFactory
     * @param AttributeSetFactory $attributeSetFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }


    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * For create new Attribute "account_str"
         * */
        $setup->startSetup();
        /** @var CustomerSetup $customerSetup */
        $setup->getConnection()->dropIndex($setup->getTable('customer_entity'), 'CUSTOMER_ENTITY_EMAIL_WEBSITE_ID');

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);
        $used_in_forms = [
            "adminhtml_customer",
            "checkout_register",
            "customer_account_create",
            "customer_account_edit",
            "adminhtml_checkout"];


        $customerSetup->addAttribute(Customer::ENTITY, 'account_str', [
            'type' => 'varchar',
            'label' => 'AccountStr',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
            $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'account_str')
                ->addData([
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => $used_in_forms,
                ]);
            $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'card_num', [
            'type' => 'varchar',
            'label' => 'card_num',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,

        ]);
            $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'card_num')
                ->addData([
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => $used_in_forms,
                ]);
            $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'card_level', [
            'type' => 'varchar',
            'label' => 'card_level',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,

        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'card_level')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'user_id_str', [
            'type' => 'varchar',
            'label' => 'user_id_str',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
            $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'user_id_str')
                ->addData([
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => $used_in_forms,
                ]);
            $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'card_user_id', [
            'type' => 'varchar',
            'label' => 'card_user_id',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'card_user_id')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'member_role', [
            'type' => 'varchar',
            'label' => 'member_role',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'member_role')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'nickname', [
            'type' => 'varchar',
            'label' => 'nickname',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'nickname')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();

        $customerSetup->addAttribute(Customer::ENTITY, 'account_interest_email', [
            'type' => 'varchar',
            'label' => 'account_interest_email',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'account_interest_email')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();


        $customerSetup->addAttribute(Customer::ENTITY, 'account_selling_email', [
            'type' => 'varchar',
            'label' => 'account_selling_email',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'account_selling_email')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();

        $customerSetup->addAttribute(Customer::ENTITY, 'contact_notes', [
            'type' => 'varchar',
            'label' => 'contact_notes',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
            'default' => null
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'contact_notes')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();

        $customerSetup->addAttribute(Customer::ENTITY, 'contact_history', [
            'type' => 'varchar',
            'label' => 'contact_history',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'system' => 0,
            'default' => null
        ]);
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'contact_history')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => $used_in_forms,
            ]);
        $attribute->save();


        $setup->endSetup();

    }

}