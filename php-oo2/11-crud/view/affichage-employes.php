<!-- <?php echo "<pre>";  print_r($fields); echo "</pre>"; ?> -->

<table class="table table-dark text-center my-5">
    <thead>
        <tr>
            <?php foreach($fields as $values) : ?>
            <th><?= $values['Field'] ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach($data as $dataEmployes): ?>
        <tr>
            <td><?= implode('</td><td>', $dataEmployes) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>