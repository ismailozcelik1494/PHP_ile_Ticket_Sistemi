<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Writers</title>
  </head>
  <body>
    <table>
      <th><td>ID </td> <td>Name</td> <td>Title</td></th>
    <?php
        foreach ($writer as $row) {
          ?>
          <tr>
          <td></td>
          <td> <?php echo $row->WriterID; ?> </td>
          <td> <?php echo $row->Name;     ?> </td>
          <td> <?php echo $row->Title;    ?> </td>
          <tr> <?php
        }
     ?>
     </table>

     <form  action="insert" method="post">
       <input type="text" name="name" value="">
       <input type="text" name="title" value="">
       <input type="submit" name="" value="Ekle">
     </form>

  </body>
</html>
