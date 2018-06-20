Attributes Manager

Installation Steps:
- Extract extension zip file
- Move all the files to your Magento 2 root directory > app > code > Pbmage > AttributeManager directory.
- Run following commands from the root directory of your Magento 2.
		- php bin/magento module:enable Pbmage_AttributeManager (enable the extension)
		- php bin/magento setup:upgrade (Update database for this new extension)
		- php bin/magento setup:static-content:deploy en_US (This is as per your shop language for ex. en_GB or fr_FR or de_DE or it_IT etc. This is for deploy static files to your pub folder)
		- php bin/magento cache:clean (clean the cache)
You are done.

How it works?
Using this extension you can add different types of custom attributes (Textbox, Text area, Date, Boolean, Dropdown, Multiple Select) of Category, Customer and Customer Address. 
After successfully follow installation steps, New admin menu PBMAGE available in the admin.

Category Attributes:
- To add a new category attribute go to Admin > PBMAGE > Attribute Manager > Category
- Added custom category attributes list display here.
- Custom attributes of category is display on admin category form to add/update details.
- Also if you need that details on frontend than you can load category by its model and can get that category attribute details.

Customer Attributes:
- To add a new customer attribute go to Admin > PBMAGE > Attribute Manager > Customer
- Added custom customer attributes list display here.
- Custom attributes of customer are automatically display on frontend on customer register and customer account edit page if “Show on Storefront” option is set to “Yes” when add a attribute. Also it is available to admin customer form to add/update details.

Customer Address Attributes:
- To add a new customer address attribute goto Admin > PBMAGE > Attribute Manager > Customer Address
- Added custom customer address attributes list display here.
- Custom attributes of customer address are automatically display on frontend on customer register and customer my account address page if “Show on Storefront”
option is set to “Yes” when add a attribute. Also it is available to admin customer address form to add/update details.

For any help or support please contact to developer pbmage@hotmail.com
Thank you.
