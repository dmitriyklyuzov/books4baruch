<?php 
function generateListingForm($ISBN, $title, $author, $publisher, $edition, $autofocus, $action){
      
      $ISBN_val='';
      $title_val='';
      $author_val='';
      $publisher_val='';
      $edition_val='';
      $condition='';

      // set form values if they have been passed as arguments (#1-#6)
      if($ISBN!=""){
            $ISBN_val="value='".$ISBN."'";     
      }

      if($title!=""){
            $title_val="value='".$title."'";
            // $action='addListing.php';
      }
      // else{
            // $action='createBookAddListing.php';
      // }

      if($author!=""){
            $author_val="value='".$author."'";
      }
      
      if($publisher!=""){
            $publisher_val="value='".$publisher."'";
      }

      if($edition!=""){
            $edition_val="value='".$edition."'";
      }

      // set autofocus based on the passed argument #6
      if($autofocus=='title'){
            $title_val=$title_val." autofocus ='' ";
      }
      else if($autofocus=='condition'){
            $condition=" autofocus ='' ";
      }
      else $ISBN_val=$ISBN_val." autofocus ='' ";

      echo "

      <form id='newListing' action='".$action."' method='POST'>
            <label for='ISBN'>ISBN</label></br>
            <input type='text' ".$ISBN_val." name='ISBN' placeholder='ISBN' onchange='checkISBN(this.value)'>
            </br></br>
            <label for='title'>Title</label></br>
            <input type='text' ".$title_val." name='title' placeholder='Title'>
            </br></br>
            <label for='author'>Author</label></br>
            <input type='text' ".$author_val." name='author' placeholder='Author'>
            </br></br>
            <label for='publisher'>Publisher</label></br>
            <input type='text' ".$publisher_val." name='publisher' placeholder='Publisher'>
            </br></br>
            <label for='edition'>Edition</label></br>
            <input type='text' ".$edition_val." name='edition' placeholder='Edition #'>
            </br></br>
            <label for='condition'>Condition</label></br>
            <input type='text' ".$condition."name='condition' placeholder='Condition - 1 to 10'>
            </br></br>
            <label for='price'>Price</label></br>
            <input type='text' name='price' placeholder='Price'>
            </br></br>
            <label for='description'>Description</label></br>
            <textarea form='newListingForm' name='description' rows='4'></textarea>
            </br></br>
            <input type='submit' value='ADD'>
      </form>

            ";

}
?>