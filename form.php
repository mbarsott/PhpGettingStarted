<?php
$name='';
$password='';
$gender='';
$color='';
$languages=[];
$comments='';
$tc='';

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name=$_POST['name'];
    }
    if (isset($_POST['password'])) {
        $password=$_POST['password'];
    }
    if (isset($_POST['gender'])) {
        $gender=$_POST['gender'];
    }
    if (isset($_POST['color'])) {
        $color=$_POST['color'];
    }
    if (isset($_POST['languages'])) {
        $languages=$_POST['languages'];
    }
    if (isset($_POST['comments'])) {
        $comments=$_POST['comments'];
    }
    if (isset($_POST['tc'])) {
        $tc=$_POST['tc'];
    }
    printf(
        'User name: %s,
        <br>Password: %s,
        <br>Gender: %s,
        <br>Color: %s,
        <br>Language(s): %s,
        <br>Comments: %s,
        <br>T&amp;C: %s',
        htmlspecialchars($name, ENT_QUOTES),
        htmlspecialchars($password, ENT_QUOTES),
        htmlspecialchars($gender, ENT_QUOTES),
        htmlspecialchars($color, ENT_QUOTES),
        htmlspecialchars(implode(' ', $languages), ENT_QUOTES),
        htmlspecialchars($comments, ENT_QUOTES),
        htmlspecialchars($tc, ENT_QUOTES)
    );
}
?>
<form action="" method="post">
  <label for="name">User name:</label>
  <input type="text" name="name">
  <br>
  <label for="password">Password:</label>
  <input type="text" name="password">
  <br>
  <label for="gender">Gender: </label>
  <input type="radio" value="f"> female
  <input type="radio" value="m"> male
  <input type="radio" value="o"> other
  <br>
  Favorite color:
  <select name="color" id="color">
    <option value="">Please select</option>
    <option value="#f00">red</option>
    <option value="#0f0">green</option>
    <option value="#00f">blue</option>
  </select>
  <br>
  <label for="languages[]">Languages spoken</label><select multiple name="languages[]" id="languages" size="3">
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="it">Italian</option>
  </select>
  <br>
  <label for="comments">Comments: </label><textarea name="comments" id="comments" cols="30" rows="10"></textarea>
  <br>
  <input type="checkbox" name="tc" value="ok" /> I accept the T&ampC<br>
  <input type="submit" name="submit" value="Search">
</form>