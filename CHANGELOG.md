# 31.1

* Update VariableAnalysis package

# 31.0

* Update Magento coding standard to version 31

# 27.1

* Removal of `Missing short description` test

# 27.0

* Update Magento coding standard to version 27
* Remove autotagging to `latest`
* Change in versioning format

# 3.2.0

* Update Magento coding standards to version 6
* Update code sniffer to latest version
* Add escaper and secureRenderer to the lsit of allowed undefined variables
* Set image to be built for PHP 7.4

# 3.1.6

* Ban Magento copyright notice in custom code
* declare(strict_types) must have one empty line between <?php and itself

# 3.1.5

* Update of base Magento coding standard to version 3

# 3.1.4

* Tagging change, meta version

# 3.1.3

* Tagging change, meta version

# 3.1.2

* Comment for function parameter no longer require period at the end
* Comment for function parameter can start with lower case letter

# 3.1.1

* Comment is no longer required for @throws DocBlock
* Comment of @throws no longer require period at the end
* Comment of @throws can start with lower case letter

# 3.1.0

* Introduced new standard, **mcga**, which is supposed to combine _MEQP2_ and _Magento2_ standards + a lot of our own to fix common mistakes. This one is supposed to be frequently expanded
* _mcga_ checks if DocBlock properly describes input and output parameters of the functions, including @throw
* _mcga_ checks if there are unused or undefined variables in code
* _mcga_ forces new line between statement and DocBlock
* _mcga_ requires DocBlock of constant to add more value if it already exists
* Removing vendor from git, refactoring build process
* Bumping base Docker image to PHP 7.3 (previously 5.6)
* License change
* README.md revamp
* Testing on multiple PHP versions
