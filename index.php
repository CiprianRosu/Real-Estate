
<?php
include 'header.php';
include "AllProperties.php";
?>


		<div id="searchBar">
			<label for="search">Search</label>
			<input id="searchBarInput" name="search" type="text" placeholder="Enter zipcode"/>
		</div>

		<div id="listOfProperties">
    <ul>
        <div id="filteredProperties"></div>
    </ul>
</div>

<?php
include 'footer.php';
?>