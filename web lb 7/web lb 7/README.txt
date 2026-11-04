ONLINE BOOKSTORE - MCA108P LAB SHEET 7 SOLUTION

REQUIREMENTS
- XAMPP/WAMP/LAMP (Apache, PHP 8+, MySQL)
- Web browser

SETUP
1. Copy the Online_Bookstore_Solution folder into your server web root:
   XAMPP: C:\xampp\htdocs\
2. Start Apache and MySQL.
3. Open phpMyAdmin (http://localhost/phpmyadmin).
4. Import database.sql. It creates database online_bookstore and sample books.
5. Open config.php and set your MySQL username/password if different.
6. Visit http://localhost/Online_Bookstore_Solution/

ADMIN SETUP
1. Register a normal account through Register.
2. In phpMyAdmin, run:
   USE online_bookstore;
   UPDATE users SET role='admin' WHERE email='your-email@example.com';
3. Log out and log in again. Open /admin/index.php.
   (Admin pages are protected by role check.)

FEATURES INCLUDED
1. Responsive bookstore homepage, featured books, promotional banner, category navigation and search.
2. MySQL schema for books, users, orders, order_items, reviews and wishlist.
3. Dynamic book listing and pagination.
4. Book detail page using GET id.
5. Registration, password_hash/password_verify, secure session regeneration.
6. Session cart with add, update and remove.
7. Checkout saves shipping/order data and order items in a transaction.
8. Admin inventory dashboard: add books, update prices and stock.
9. Admin order list and status updates.
10. Search by title, author or category.
11. Pagination.
12. Customer order history.
13. Stock validation while adding to cart and again at checkout.
14. PDO prepared statements and output escaping.
15. User star rating and review comments.
16. Invoice summary and print option.
17. Database-backed wishlist.
18. JavaScript native form validation.
19. Bootstrap 5 + custom CSS.
20. End-to-end workflow can be tested as described below.
21. Admin sales summary and monthly revenue.

END-TO-END TEST
- Register a customer, login, search for a book and open details.
- Add a book to cart, change quantity and checkout.
- View invoice and My Orders.
- Register another account or promote one account to admin using SQL above.
- Admin can add/update books, change order status and view reports.

SECURITY / CLASS PROJECT NOTES
- Use HTTPS in production, keep database credentials outside public web root,
  add rate limiting and email verification before real deployment.
- The project is an educational starter implementation, not a production-ready
  payment gateway. It records an order but does not process card/UPI payments.
