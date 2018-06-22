<?php
/**
 * Indian States in Select list
 * Copyright (C) 2017  
 * 
 * This file is part of Credevlabz/DirectoryIndianStates.
 * 
 * Credevlabz/DirectoryIndianStates is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Credevlabz\DirectoryIndianStates\Setup;

use Magento\Directory\Helper\Data;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Directory data
     *
     * @var Data
     */
    private $directoryData;
    
        /**
         * Init
         *
         * @param Data $directoryData
         */
        public function __construct(Data $directoryData)
        {
            $this->directoryData = $directoryData;
        }
    
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        
        /**
         * Fill table directory/country_region
         * Fill table directory/country_region_name for en_US locale
         */
        $data = [
        ['IN','AN','Andaman and Nicobar Islands'],
        ['IN','AP','Andhra Pradesh'],
        ['IN','AR','Arunachal Pradesh'],['IN','AS','Assam
        '],['IN','BR','Bihar
        '],['IN','CH','Chandigarh
        '],['IN','CT','Chhattisgarh
        '],['IN','DN','Dadra and Nagar Haveli
        '],['IN','DD','Daman and Diu
        '],['IN','DL','Delhi
        '],['IN','GA','Goa
        '],['IN','GJ','Gujarat
        '],['IN','HR','Haryana
        '],['IN','HP','Himachal Pradesh
        '],['IN','JK','Jammu and Kashmir
        '],['IN','JH','Jharkhand
        '],['IN','KA','Karnataka
        '],['IN','KL','Kerala
        '],['IN','LD','Lakshadweep
        '],['IN','MP','Madhya Pradesh
        '],['IN','MH','Maharashtra
        '],['IN','MN','Manipur
        '],['IN','ML','Meghalaya
        '],['IN','MZ','Mizoram
        '],['IN','NL','Nagaland
        '],['IN','OR','Odisha
        '],['IN','PY','Puducherry
        '],['IN','PB','Punjab
        '],['IN','RJ','Rajasthan
        '],['IN','SK','Sikkim
        '],['IN','TN','Tamil Nadu
        '],['IN','TG','Telangana
        '],['IN','TR','Tripura
        '],['IN','UP','Uttar Pradesh
        '],['IN','UT','Uttarakhand
        '],['IN','WB','West Bengal']
        ];


        foreach ($data as $row) {
            $bind = ['country_id' => $row[0], 'code' => $row[1], 'default_name' => $row[2]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region'), $bind);
            $regionId = $setup->getConnection()->lastInsertId($setup->getTable('directory_country_region'));

            $bind = ['locale' => 'en_US', 'region_id' => $regionId, 'name' => $row[2]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region_name'), $bind);
        }

        $countries = $this->directoryData->getCountryCollection()->getCountriesWithRequiredStates();
        $setup->getConnection()->delete(
            $setup->getTable('core_config_data'),
            ['scope = ?' => 'default',
            'scope_id = ?' => 0,
            'path = ?' => Data::XML_PATH_STATES_REQUIRED
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('core_config_data'),
            [
                'scope' => 'default',
                'scope_id' => 0,
                'path' => Data::XML_PATH_STATES_REQUIRED,
                'value' => implode(',', array_keys($countries))
            ]
        );
    }
}
