<div class="delete">
<?php $note = $params['note'] ?? null; ?>
<?php if($note) : ?>
    <ul>
    <li> Id : <?php echo (int) $note['id']?></li>
    <li> tytul:<?php echo htmlentities($note['title'])?></li>
    <li> opis<?php echo htmlentities($note['description'])?></li> 
    <li> utworzono<?php echo htmlentities($note['created'])?></li> 
    <li><a href="/"> <button>Powrot do listy notatek</button></a></li>
    <li>
        <form method="POST" action ="/?action=delete">
            <input type="text" name="id" value="<?php echo $note['id']?>"hidden>
            <input type ="submit" value="usun">
    </form> 
    </li>
    </ul>
    <?php else : ?>
    <div>Brak notatki do wsywietlenia</div>
    <?php endif; ?>
</div>