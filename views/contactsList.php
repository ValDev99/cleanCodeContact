<?php if ($contactToEdit): ?>
    <h2>Modifier un Contact</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $contactToEdit['id'] ?>">
        <label for="username">Nom :</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($contactToEdit['username']) ?>" required>
        <label for="phonenumber">Téléphone :</label>
        <input type="text" id="phonenumber" name="phonenumber" value="<?= htmlspecialchars($contactToEdit['phonenumber']) ?>" required>
        <button type="submit">Modifier</button>
    </form>
    <a href="index.php">Annuler la modification</a>
<?php else: ?>
    <h2>Ajouter un Nouveau Contact</h2>
    <form method="post" action="">
        <label for="username">Nom :</label>
        <input type="text" id="username" name="username" required>
        <label for="phonenumber">Téléphone :</label>
        <input type="text" id="phonenumber" name="phonenumber" required>
        <button type="submit">Ajouter</button>
    </form>
<?php endif; ?>

<h2>Liste des Contacts</h2>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($contacts) > 0): ?>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['username']) ?></td>
                    <td><?= htmlspecialchars($contact['phonenumber']) ?></td>
                    <td>
                        <a href="?edit=<?= $contact['id'] ?>">Modifier</a>
                        <a href="?delete=<?= $contact['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Aucun contact trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
