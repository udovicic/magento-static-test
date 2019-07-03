3.1.0

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