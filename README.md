# Test assigment - e-commerce 
Let's say there are 4 products in the internet shop, apple for 0.3$, beer for 2$, water for 1$ and cheese for 3.74$, stored in Mysql DB

Create a simple interface where:
required functions:
- I can add/remove products to my virtual cart in any quantities
- i can see my current cart status
- i have to choose transport type from some select, 'pick up' costs 0$, 'UPS' costs 5$, by default it's not chosen, and if i don't
choose it, it says i have to when i click 'pay'
- i can click 'pay', which will deduct costs from my current cash (my cash is 100$ and it is stored per session) , and will write the price and the rest 
received.
- shop should be in English only including code comments
- please write shop using PHP7.2 OOP
- Near each product there is a rating scale from 1 to 5, I can rate it and I can see current average rating of each product. Rating should only be allowed once per session or once per user and rates are stored using Mysql DB.
- some CSS/html/JS so it looks a little better

General requirements
- DRY;
- Neat and consistent style;
- Understandable names;
- Clear logic flow without spaghetty code, short methods;
- Minimal reliance on global state: e.g. usage of superglobals, a separate place processing them should be dedicated.

OOP requirements
- Logic should be fully inside classes including ajax controller (but except, maybe, Views);
- Separation of concerns: one class is responsible for a single thing;
- Minimum (or zero) amount of static methods;
- Encapsulation;
- Existence of entities / models like ShoppingCart;

Please DO NOT use anybody else work for this. EVERYTHING in this project should be written by you for the purpose of this project (no reuse of old projects).
From external project you could only use Jquery, Ajax and Bootstrap if needed. Using any PHP framework is strictly forbidden, but you can use third-party libraries if you need them.
Please use Allman coding style, https://en.wikipedia.org/wiki/Indent_style#Allman_style
 put it on our hosting https://www.zzz.com.ua/en (registration is free) and give me the link.
 
Before you start, please tell me how much time approximately do you need to accomplish the task.
Also please don't hesitate to ask for clarification.
