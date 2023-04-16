<div>
    <section>
<div class="message">
    <?php
    if(!empty($params['before'])){

        switch ($params['before']){
            case 'created';
            echo 'Notatka zostala utworzona';
            break;
        }
    }

    ?>
    </div>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>

                <tr>
                    <th>id</th>
            <th>tytul</th>
            <th>data</th>
            <th>opcje</th>
            </tr>
        </thead>
    </table>

        </div>
        <div class="tbl-content">
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <?php foreach ($params['notes'] as $note):?>
                    <tr>
                        <td><?php echo $note['id']?></td>
                        <td><?php echo $note['title']?></td>
                        <td><?php echo $note['created']?></td>
                        <td>optcje</td>
                    </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
                    </section>
        
    </div>
    <?php echo $params['resultList'] ?? ""; ?>
    </b>
    <h3>Lista notatek</h3>