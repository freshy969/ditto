function retrieveUserAlbums(userId) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
        // var resultObject = JSON.parse(this.responseText);// receives an array of json objects
        // document.getElementById("ajaxResult").innerHTML = resultObject;
        // // Build up thumbnail thing
        // var testArray = "";
        // for (var index in resultObject) {
        //   // create a 150 x 150 thumbnail
        //   var thumbnail = '<div class="thumbnail"><img src="../../img/invalid.png" class="thumbnail-img"><p class="thumbnail-title">' + resultObject[index].albumName + '</p></div>';
        //   testArray += thumbnail;
        // }
        // document.getElementById("ajaxResult").innerHTML = testArray;
        document.getElementById("ajaxResult").innerHTML = this.responseText;
      } else if (this.status == 400) {
        document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
      } else {
        document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
      }
    };
  };
  // gets the values from the page
  var querystring = "?userId=" + userId;
  xmlhttp.open("GET", "../php/albums/new_retrieve_user_albums.php" + querystring, true);
  xmlhttp.send();
}
