# Restaurant Management System - Progress Tracker

This document tracks the implementation progress of the project requirements. Checkboxes marked with `[x]` are completed, while `[ ]` indicates features that still need to be built.

## 👩‍💻 Customer (User) Features

### Authentication & Profile Management
- [x] Register for a new account by providing personal information.
- [x] Log in securely using an email and password.
- [x] Automatically redirect to the homepage (`/home`) after logging in.
- [x] Manage and update their personal profile.
- [ ] Receive a "Welcome back" notification upon successful login.

### Menu & Cart Management
- [x] Browse the digital food menu.
- [x] Add desired food items to a digital shopping cart.
- [x] View the cart to check the list of items, quantities, and the total price.
- [x] Remove items from the cart before placing an order.

### Order Placement
- [x] Confirm the order from the cart interface.
- [x] Provide or confirm their delivery address and phone number during checkout.
- [x] See an "Order Placed Successfully" confirmation screen once the transaction is complete.
- [x] Have their session's cart cleared automatically after a successful order.

### Table Reservation
- [x] Access a "Book Table" section on the homepage.
- [x] Submit a booking request by filling out a form with Name, Email, Phone, Guests, Date, and Time.
- [ ] System validation ensures the selected date and time are in the future.
- [ ] Receive a confirmation message stating, "Your reservation request has been sent".

---

## 🛡️ Admin Features

### Authentication & Dashboard
- [x] Access a centralized dashboard to monitor all restaurant workflow activities in real-time.
- [ ] Log in securely and automatically redirect directly exclusively to `/admin/dashboard`.

### Menu Management
- [x] Add new food items using a form that includes Title, Price, Description, and an Image Upload from local storage.
- [x] See a success message and be redirected to the "View Food" page after adding an item.
- [x] Edit or modify existing food items.
- [x] Delete or remove food items from the menu.
- [ ] Rely on automatic system validation to check that the inputted price is numeric.
- [ ] Ensure automatic backend validation to verify the uploaded image file is valid.

### Order & Reservation Management
- [x] View all active orders placed by customers.
- [x] Receive booking details in the dashboard and manage incoming table reservations.

### Reporting & User Management
- [ ] Manage registered users (View, Edit, Delete).
- [ ] Select report types, retrieve data (e.g., total sales, popular items), and generate system reports.

---

## ⚙️ System Admin Features
- [x] Maintain the overall database.
- [x] Encrypt all user passwords before saving them.
- [x] UI/UX Responsiveness (Rebuilt entirely using Tailwind CSS).
- [ ] Manage system security protocols.
- [ ] Monitor overall application performance.

---

## 💎 Extra Suggested Features (Extensions)

### Enhanced Ordering & Payments
- [ ] **Order Status Tracking:** Allow Admins to update order status (Pending → Preparing → Out for Delivery).
- [ ] **User Order History:** Create a customer profile page displaying their past orders and live tracking.
- [ ] **Online Payments:** Integrate Stripe to process credit card payments securely during checkout.

### Advanced Admin Management
- [ ] **Dashboard Metrics & Charts:** Add dynamic visual charts (Chart.js/ApexCharts) for Revenue, Total Orders, and Popular Items to the admin dashboard.
- [ ] **Booking Approval System:** Allow Admins to "Confirm" or "Reject" reservations dynamically.
- [ ] **Email Notifications:** Trigger automated emails to customers when their booking is confirmed or order is shipped.

### User Interface Polish
- [ ] **Dynamic Toast Notifications:** Replace basic text alerts with beautiful popup toasts (e.g., SweetAlert) for cart additions, bookings, and logins.
