<?php
  //update.php?id=2
  if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
      $id = $_GET['id'];
  } else {
      header('Location: select.php');
  }

$name='';
$gender='';
$color='';


if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name']==='') {
        $ok = false;
    } else {
        $name=$_POST['name'];
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
    if ($ok) {
        $db = new mysqli(
            'localhost',
            'php_getting_started_user',
            'php_getting_started_password',
            'php_getting_started'
        );
        // first approach
        /*
        $sql = sprintf(
            "UPDATE users SET
                        name='%s',
                        gender='%s',
                        color='%s'
                    WHERE id=%s",
            $db->real_escape_string($name),
            $db->real_escape_string($gender),
            $db->real_escape_string($color),
            $db->real_escape_string($id)
        );
        $db->query($sql);
        */
        // second approach
        $stmt = $db->prepare(
            "UPDATE users SET 
                name=?,
                gender=?,
                color=?
                WHERE id=?"
        );
        $stmt->bind_param('sssi', $name, $gender, $color, $id); // 'sss' stands for thre strings to be bound
        $stmt->execute();
        echo '<p>User updated.</p>';
        $db->close();
    }
} else {
    $db = new mysqli(
        'localhost',
        'php_getting_started_user',
        'php_getting_started_password',
        'php_getting_started'
    );
    $sql = "SELECT * FROM users WHERE id=".$db->real_escape_string($id);
    $result = $db->query($sql);
    foreach ($result as $row) {
        $name = $row['name'];
        $gender = $row['gender'];
        $color = $row['color'];
    }
    $db->close();
}
?>
<form action="" method="post">
    <label for="name">User name: </label>
    <input type="text" name="name"
        value="<?=htmlspecialchars($name, ENT_QUOTES)?>">
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
    <input type="submit" name="submit" value="Update">
</form>