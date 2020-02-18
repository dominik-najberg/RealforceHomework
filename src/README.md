# Realforce homework

### Installation
```shell script
composer install
bin/phpunit
```

### Explanation
* Country Tax for salaries is 20%
* If an employee older than 50 we want to add 7% to his salary
* If an employee has more than 2 kids we want to decrease his Tax by 2%
* If an employee wants to use a company car we need to deduct $500

### Situation
* Alice is 26 years old, she has 2 kids and her salary is $6000
* Bob is 52, he is using a company car and his salary is $4000
* Charlie is 36, he has 3 kids, company car and his salary is $5000

### Tests
The tests are pretty self-explanatory. All the test cases from the Situation paragraph
are covered in the SalaryCalculatorTest. I also included domain logic tests as I thrive
to keep 100% code coverage on the domain layer.

### Extras
I added a custom exception for the sake of it. 

#### Contact
In case you have any questions please don't hesitate to contact me. Have a great day!