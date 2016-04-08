
		$table_name = $_POST['table_name']; // Table name
		$s_date = $_POST['start_date']; // start date
    $e_date = $_POST['end_date']; // end date
		$conn = mysqli_connect("localhost","username","password");
		$con_db = mysqli_select_db($conn, "db_name");

		$filename = date('Y.m.d') . "_events.csv"; // file name
		$fp = fopen('php://output', 'w');

		$header = array("ID", "Registration Date", "First Name", "Last Name", "Email", "Address", "Suburb", "State", "Pin No.", "Phone", "Mobile", "Event Name", "Event Date", "Number Of Guests", "Guests Users", "Donation", "Referer"); // header gose here
    // file type header diclration
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		fputcsv($fp, $header);
    // others data gose here
		$query = "SELECT * FROM $table_name WHERE date BETWEEN '$s_date' AND '$e_date'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_row($result)) {
			fputcsv($fp, $row);
		}
		fclose($fp);
