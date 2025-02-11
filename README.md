<h2>Overview</h2>
<p>This website consists of two main sections:</p>
<ul>
    <li><strong>Admin Dashboard</strong></li>
    <li><strong>User Interface</strong></li>
</ul>
<p>A common <strong>login interface</strong> is provided for both users and admins. Authentication is managed through a <code>is_admin</code> field in the database (Boolean type). If <code>is_admin</code> is set to <code>1</code>, the user is redirected to the admin dashboard; otherwise, they are taken to the main user interface.</p>

<hr>

<h2>Admin Dashboard</h2>

<h3>🔹 Main Dashboard</h3>
<ul>
    <li>Displays general statistics about the available sections and features of the website, including:</li>
    <ul>
        <li>Number of medical categories</li>
        <li>Number of articles</li>
        <li>Number of consultations (pending & responded)</li>
    </ul>
</ul>

<h3>🔹 Category Management</h3>
<ul>
    <li>Full CRUD operations:</li>
    <ul>
        <li><strong>Add</strong> new medical categories</li>
        <li><strong>Edit</strong> existing categories</li>
        <li><strong>Delete</strong> categories</li>
        <li><strong>View</strong> category details</li>
    </ul>
</ul>

<h3>🔹 Article Management</h3>
<ul>
    <li>Full CRUD operations:</li>
    <ul>
        <li><strong>Add</strong> new articles</li>
        <li><strong>Edit</strong> existing articles</li>
        <li><strong>Delete</strong> articles</li>
        <li><strong>View</strong> articles</li>
    </ul>
    <li>Articles are sorted based on:</li>
    <ul>
        <li><strong>Number of visits</strong></li>
        <li><strong>Recently added articles</strong></li>
    </ul>
</ul>

<h3>🔹 Consultation Management</h3>
<ul>
    <li>Displays all consultations submitted by registered users, sorted by oldest first.</li>
    <li>Allows viewing consultation details, user information, and sending responses.</li>
</ul>

<h3>🔹 Recycle Bin</h3>
<ul>
    <li>Any deleted medical category or article is moved here.</li>
    <li>Admin can either:</li>
    <ul>
        <li><strong>Restore deleted items</strong></li>
        <li><strong>Permanently delete items</strong></li>
    </ul>
</ul>

<hr>

<h2>User Interface</h2>

<h3>🔹 Home Page</h3>
<ul>
    <li>Displays medical articles sorted by <strong>number of visits</strong>.</li>
    <li>Includes a <strong>search bar</strong> for finding articles.</li>
    <li>A <strong>sidebar</strong> with:</li>
    <ul>
        <li>Most viewed articles</li>
        <li>List of medical categories</li>
    </ul>
    <li>Users can browse articles by specific categories.</li>
</ul>

<h3>🔹 Consultation Requests</h3>
<ul>
    <li>Users can submit a consultation request (requires login or account creation).</li>
</ul>

<h3>🔹 Messaging System</h3>
<ul>
    <li>Contains a <strong>consultation inbox</strong> for users to view their submitted consultations and responses.</li>
</ul>

<hr>
<p>This system ensures efficient content and user management, providing a seamless experience for both admins and users.</p>
