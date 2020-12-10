if ($beername == '') {
  $beername = $row['name'];
  echo '<div class="beername_wrapper"><div>';
  echo '<img style="height:200px;" src="./images/oelkassenlogod.png">';
  echo '<div class="description-left">
          <div class="description">
              <h2 class="beer-name">'; echo $row['name']; echo '</h2>';
              echo '<p class="beer-description">'; echo $row['description']."</br>" .' '; echo '</p>';
          echo '</div>
          <div class="description-price-button">
              <div class="description-price">
                  <p class="price">'; echo $row['price']; echo '</p>';
                  echo '<p class="stock-status">På lager</p>';
              echo '</div>
              <div class="description-button">
                  <button>LÆG I KURV</button>
              </div>
          </div>
        </div>';
  echo '<div class="description-right">
          <div class="description-list">
            <ul>
              <li><p class="description-list-bold">Kategori:</p><p class="description-list-normal">'; echo $row['categoryID']; echo '</p></li>
              <li><p class="description-list-bold">Type:</p><p class="description-list-normal">'; echo $row['type']; echo '</p></li>
              <li><p class="description-list-bold">Alkohol:</p><p class="description-list-normal">'; echo $row['alcohol']; echo '</p></li>
              <li><p class="description-list-bold">Størrelse:</p><p class="description-list-normal">'; echo $row['size']; echo '</p></li>
              <li><p class="description-list-bold">Bryggeri:</p><p class="description-list-normal">'; echo $row['brewery']; echo '</p></li>
              <li><p class="description-list-bold">Land:</p><p class="description-list-normal">'; echo $row['countryID']; echo '</p></li>
              <li><p class="description-list-bold">Rating:</p><p class="description-list-normal">'; echo $row['ratingID']; echo '</p></li>
            </ul>
          </div>
        </div>';

//If the "name" from the database ISN'T EQUAL to the previous $beername, then close the list, and echo out the next $beername.
}elseif ($row['name'] != $beername) {
  $beername = $row['name'];
  echo '</div><div>';
  echo '<img style="height:200px;" src="./images/oelkassenlogod.png">';
  echo '<div class="description-left">
          <div class="description">
              <h2 class="beer-name">'; echo $row['name']; echo '</h2>';
              echo '<p class="beer-description">'; echo $row['description']."</br>" .' '; echo '</p>';
          echo '</div>
          <div class="description-price-button">
              <div class="description-price">
                  <p class="price">'; echo $row['price']; echo '</p>';
                  echo '<p class="stock-status">På lager</p>';
              echo '</div>
              <div class="description-button">
                  <button>LÆG I KURV</button>
              </div>
          </div>
        </div>';
  echo '<div class="description-right">
          <div class="description-list">
            <ul>
              <li><p class="description-list-bold">Kategori:</p><p class="description-list-normal">'; echo $row['categoryID']; echo '</p></li>
              <li><p class="description-list-bold">Type:</p><p class="description-list-normal">'; echo $row['type']; echo '</p></li>
              <li><p class="description-list-bold">Alkohol:</p><p class="description-list-normal">'; echo $row['alcohol']; echo '</p></li>
              <li><p class="description-list-bold">Størrelse:</p><p class="description-list-normal">'; echo $row['size']; echo '</p></li>
              <li><p class="description-list-bold">Bryggeri:</p><p class="description-list-normal">'; echo $row['brewery']; echo '</p></li>
              <li><p class="description-list-bold">Land:</p><p class="description-list-normal">'; echo $row['countryID']; echo '</p></li>
              <li><p class="description-list-bold">Rating:</p><p class="description-list-normal">'; echo $row['ratingID']; echo '</p></li>
            </ul>
          </div>
        </div>';
//Else only echo the values in the "answer" column.
}else {
  //echo $row['taste'] .' ';
}
