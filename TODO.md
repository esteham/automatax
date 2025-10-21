# TODO: Add Sidebar to Admin Dashboard

-   [x] Create Sidebar.vue component in resources/js/Pages/Dashboard/Admin/
-   [x] Create SidebarLink.vue component in resources/js/Pages/Dashboard/Admin/
-   [x] Create Overview.vue page component in resources/js/Pages/Dashboard/Admin/
-   [x] Create Users.vue page component in resources/js/Pages/Dashboard/Admin/
-   [x] Create Settings.vue page component in resources/js/Pages/Dashboard/Admin/
-   [x] Update Index.vue to include sidebar layout and dynamic content loading
-   [x] Test navigation and responsiveness

# TODO: Implement Role-Based Sidebar Links

-   [x] Update DashboardController.php to redirect admin, auditor, and accountant to Admin/Index with role data
-   [x] Modify Admin/Index.vue to accept and pass role prop to Sidebar
-   [x] Update Sidebar.vue to filter links based on user role (admin: all, auditor: Overview+Users, accountant: Overview+Settings)
-   [x] Test role-based access for different user types
