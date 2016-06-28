<?php
//generate query based on keyword
function generateSearchQuery($keyword){

	return "SELECT book_title, book_author, book_ISBN,
					book_edition, listing_condition, price, first_name,
					student_email, phone_number, listing_id
			FROM book_info 
			INNER JOIN listing ON book_info.book_ISBN=listing.ISBN
			INNER JOIN student on listing.student_email=student.email
			WHERE  book_author LIKE '%" .$keyword."%'
				OR book_title LIKE '%" .$keyword."%'
				OR email = '".$keyword."'
				OR book_ISBN = '" .$keyword."'";
}
?>