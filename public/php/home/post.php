<?php include "$_SERVER[DOCUMENT_ROOT]/php/blogs/userblogs.php";
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/getProfilePic.php");

$usersblogs = retrieve_blog_content(db_quote($userId));

while ( $row = $usersblogs->fetch_assoc()){

  $blogId = $row['blogId'];
  $fullname = $user_data['fName'] . " " . $user_data['lName'];
  $uname = $user_data['username'];
  $blogcontent = $row['content'];
  $blog_user = $row['userId'];

    echo "<article id=\"b_$blogId\" class=\"media\">
      <figure class=\"media-left image is-32x32\">
        <p class=\"image is-32x32\">";
    echo getProfilePic($blog_user);
    echo "
        </p>
      </figure>

      <div class=\"media-content\">
        <div class=\"content\">
          <p>
            <strong> $fullname </strong> <small> @$uname </small><br>
          </p>
          $blogcontent <br>
          "
          ;

      viewComments($row['blogId']);

      echo "
        </div>

        <nav class=\"level\">
          <div class=\"level-item\">
          <div class=\"media-content\">
          <form id=\"$blogId\" name=\"bl_$blogId\" onsubmit=\"addComment($blogId, $blog_user, document.forms['bl_$blogId'].elements['comment'].value);\">
            <div class=\"control is-grouped\">
            <figure class=\"media-left\">
            </figure>
              <p class=\"control is-expanded\">
                <input id=\"comment\" class=\"input\" type=\"text\" name=\"comment\" placeholder=\"What do you have to say $firstname?\" required>
                <input type=\"hidden\" name=\"blogId\" value=\"$blogId\"/>
              </p>
              <p class=\"control\">
                <input class=\"button is-primary\" type=\"submit\" style=\"display: none;\" name=\"submit\">
              </p>
              <p class=\"control\">
              </p>
            </div>
          </form>
          </div>
          </div>
        </nav>
      </div>
      <div class=\"media-right\">
        <button class=\"delete\" onclick=\"deleteBlog($blogId)\"></button>
      </div>
    </article>
  ";
  }

function viewComments($blogId) {

    $query = "SELECT * FROM `comments` WHERE `blogId` = '$blogId'";
    $result = db_query($query);

    while ($comment = $result->fetch_assoc()) {
      $content = $comment['message'];
      $userId = $comment['userId'];
      $postTime = $comment['createdAt'];
      $commentId = $comment['commentId'];

      // get the user details of the comment poster
      $bloguser = getUser($userId);
      $fName = $bloguser['fName'];
      $lName = $bloguser['lName'];
      $user = $bloguser['username'];

      $comments_html ="
      <article id=\"c_$commentId\" class=\"media\">
        <figure class=\"media-left\">
        </figure>
        <div class=\"media-content\">
          <div class=\"content\">
            <p>
              <a href=\"/$user\">$fName $lName </a><small>  @$user  </small> <small>$postTime</small><br>
                $content
            </p>
          </div>
        </div>
        <a class=\"delete is-small\" onclick=\"deleteComment($commentId);\"></a>

        </article>
        ";
      echo $comments_html;
    }
}

function getUser($id) {
  $result = db_query("SELECT * FROM `users` WHERE `userId` = '$id'");
  return $result->fetch_assoc();
}
?>
