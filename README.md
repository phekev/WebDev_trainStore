Web Development App Project 2022

'eCommerence' site which sells Thomas the Tank Engine toys.

Responive website written in Javascript, PHP, MySQL, Bootstrap



The user is be presented with a login / register page
 The login validates user info against database and will give an alert if username/password do not match
![login](https://user-images.githubusercontent.com/81191184/178979077-c7521257-9b25-4c12-bd88-8aac30c1a391.jpg)

A new user can register. Usernames are checked against existing and a warning will appear if the username is unavailable
![register](https://user-images.githubusercontent.com/81191184/178979107-61941914-084c-4ac8-beb4-8bbd4786854f.jpg)

Once logged in, you are taking to the main page. The page loads dynamically based on the number of items in the product table. This is done using a while loop and creating a card for each table row. So if products are added/removed from the products table the page will change accordingly.
![main_page](https://user-images.githubusercontent.com/81191184/178979125-72988014-7f32-4884-be63-5438799e8664.jpg)

When an item is selected, in this case Gordon, a carousel will display pictures. The product page is the same layout for each product and loads content based on the product ID sent with the query. Gordon has a product ID of 1006, so all info related to prod_ID=1006 is loaded.
There are two options for purchase - Add to cart or Buy now. When Add to cart is selected the user can add the item and continue 'shopping'
![add_to_cart](https://user-images.githubusercontent.com/81191184/178979141-1bb7bb81-0116-4f76-898b-59cd1fc98cfb.jpg)


![buy_now](https://user-images.githubusercontent.com/81191184/178979159-2d792694-71ab-427c-b1a2-42ba86bf88b3.jpg)
When Buy now is selected the user is shown an order summary of their basket. The basket is an object array which is in localStorage. The order summary is displayed by creating a dynamic table, with each index of the object array being a row in the table. 
![order_summary](https://user-images.githubusercontent.com/81191184/178979196-008fb1ab-546d-4614-9392-9a5886cf6b03.jpg)

If the user selects Purchase, the order is written to the database and they are returned to the main page once more.
![order_placed](https://user-images.githubusercontent.com/81191184/178979223-cd9f03bc-5047-47db-8d8d-00552b3a3ffb.jpg)
