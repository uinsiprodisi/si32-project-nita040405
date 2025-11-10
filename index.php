<?php include 'includes/meta.php'; ?>
<?php include 'includes/header.php'; ?>

<section>
    <?php
    $json = file_get_contents('https://gist.githubusercontent.com/ihgoyarp/2fe9a3f88a9812fedea05139865a12bf/raw/0ce5b5235e49c26b64c780c8fcf6c4adcea9ce38/SI32_PWD_2025');
    $data = json_decode ($json, True);
    ?>
</section>

<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
</tr>
<?php foreach ($data as $key => $value): ?>
    <tr>
        <td><?php echo $value['no'] ?></td>
        <td><?php echo $value['nim'] ?></td>
        <td><?php echo $value['nama'] ?></td>
</tr>
<?php endforeach ?>
</table>

<br>
<br>
<?php include 'includes/footer.php'; ?>