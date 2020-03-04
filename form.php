<?php
$name='';
$password='';
$gender='';
$color='';
$languages=[];
$comments='';
$tc='';

if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name']==='') {
        $ok = false;
    } else {
        $name=$_POST['name'];
    }
    if (!isset($_POST['password']) || $_POST['password']==='') {
        $ok = false;
    } else {
        $password=$_POST['password'];
    }
    if (!isset($_POST['gender']) || $_POST['gender']==='') {
        $ok = false;
    } else {
        $gender=$_POST['gender'];
    }
    if (!isset($_POST['color']) || $_POST['color']==='') {
        $ok = false;
    } else {
        $color=$_POST['color'];
    }
    if (!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0) {
        $ok = false;
    } else {
        $languages=$_POST['languages'];
    }
    if (!isset($_POST['comments']) || $_POST['comments']==='') {
        $ok = false;
    } else {
        $comments=$_POST['comments'];
    }
    if (!isset($_POST['tc']) || $_POST['tc']==='') {
        $ok = false;
    } else {
        $tc=$_POST['tc'];
    }
    if ($ok) {
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
}
?>
<form action="" method="post">
    <label for="name">User name: </label>
    <input type="text" name="name"
        value="<?=htmlspecialchars($name, ENT_QUOTES)?>">
    <br>
    <label for="password">Password: </label>
    <input type="text" name="password">
    <br>
    <label for="gender">Gender: </label>
    <input name="gender" type="radio" value="f" <?= $gender === 'f' ? 'checked' : '' ?>/>
    female
    <input name="gender" type="radio" value="m" <?= $gender === 'm' ? 'checked' : '' ?>/>
    male
    <input name="gender" type="radio" value="o" <?= $gender === 'o' ? 'checked' : '' ?>/>
    other
    <br>
    <label for="color">Favorite color: </label>
    <select name="color" id="color">
        <option value="">Please select</option>
        <option value="#f00" <?= $color === '#f00' ? 'selected' : '' ?>>red
        </option>
        <option value="#0f0" <?= $color === '#0f0' ? 'selected' : '' ?>>green
        </option>
        <option value="#00f" <?= $color === '#00f' ? 'selected' : '' ?>>blue
        </option>
    </select>
    <br>
    <label for="languages[]">Languages spoken: </label>
    <select multiple name="languages[]" id="languages" size="3">
        <option value="en" <?= in_array('en', $languages) ? 'selected' : '' ?>>English
        </option>
        <option value="fr" <?= in_array('fr', $languages) ? 'selected' : '' ?>>French
        </option>
        <option value="it" <?= in_array('it', $languages) ? 'selected' : '' ?>>Italian
        </option>
    </select>
    <br>
    <label for="comments">Comments: </label>
    <textarea name="comments" id="comments" cols="30"
        rows="10"><?=htmlspecialchars($comments, ENT_QUOTES)?></textarea>
    <br>
    <input type="checkbox" name="tc" value="ok" <?= $tc === 'ok' ? 'checked' : '' ?>/>
    I accept the T&ampC<br>
    <input type="submit" name="submit" value="Search">
</form>